<?php
	//questo script ha 3 funzioni che vengono chiamate per visualizzare i dati, le prenotazioni e le preferenze
    function getDati($id_utente){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT nome,cognome,username,numero FROM utenti WHERE id_utente=$1;"; 
		$ret=pg_query_params($db, $sql,array($id_utente)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			$dati=pg_fetch_assoc($ret); 
			pg_close($db);
			echo "<p>Il tuo nome: $dati[nome]</p>";
			echo "<p>Il tuo cognome: $dati[cognome]</p>";
			echo "<p>La tua email:  $dati[username]</p>";
			echo "<p>Il tuo numero: $dati[numero]</p>";
			return; 	
		}	
   	}

	function getPrenotazioni($id_utente){ 
		$nome = array("andrea","rocco","francesco");  //per scorrere tutte e 3 le tabelle di tutti e 3 i barbieri
	   	$nessunaPrenotazione = false;  //se rimane a false non si ha una prenotazione con nessun barbiere
		$data_odierna = date('Y-m-d');   //per non visualizzare prenotazioni precedenti alla data odierna

		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

		foreach ($nome as $barbiere) {  //prendo un barbiere alla volta
			$nome_tabella = "prenotazioni_" . $barbiere;  //costruisco il nome per la tabella per ogni barbiere
            $sql = "SELECT id_prenotazione, data_appuntamento,orario_appuntamento FROM " . $nome_tabella . "  
			WHERE id_utente=$1 AND data_appuntamento >= $2  
			ORDER BY data_appuntamento, orario_appuntamento;";  
			//prenotazioni ordinate per data e ora e solo con data successiva o uguale a quella odierna
			$ret=pg_query_params($db, $sql,array($id_utente,$data_odierna));
			if(!$ret) {     
				echo "ERRORE QUERY: " . pg_last_error($db);
				pg_close($db);
				return false; 
			}
			else{
				if(pg_num_rows($ret)!=0){  //se ci sono prenotazioni in quella tabella per quell'utente
					$nessunaPrenotazione=true;  //messo almeno una volta a true significa che esistono prenotazioni
					echo "<p>Barbiere: $barbiere</p>";  //stampo il nome del barbiere una volta
					echo "<div class=\"flex\">";
					while ($prenotazione = pg_fetch_assoc($ret)) {
						echo "<div class=\"card\">";
							echo "<p>Data: " . $prenotazione["data_appuntamento"] . "</p>";
							echo "<p>Orario: " . substr($prenotazione["orario_appuntamento"], 0, 5) . "</p>"; 
							 //substr per rimuovere i secondi, nel database è salvato in secondi
							echo "<button class=cancbutton 
							onclick='cancellaPrenotazione(\"" . $barbiere . "\", \"" . $prenotazione["id_prenotazione"] . "\", \"" . $id_utente . "\")'>
							Cancella</button>";
							//la funzione cancellaPrenotazione ha bisogno di sapere il barbiere (quale tabella) e quale id, sia prenotazione che utente
						echo "</div>";
					}
					echo "</div>";
				}	
			}          
		} 
		if (!$nessunaPrenotazione) {  //se non si ha una prenotazione per nemmeno un barbiere
			echo "<p>Sembra che tu non abbia effettuato neanche una prenotazione</p>";
			echo "<p><a href='prenota.php' class=linkbutton>Qui</a> puoi effettuarne una</p>";
		}	
   	}
	
	function getPreferenze($id_utente){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE id_utente=$1;";
		$ret=pg_query_params($db, $sql,array($id_utente)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{  
            $preferenza = pg_fetch_assoc($ret);
			pg_close($db);
			$i=1;
			$numeroPrefenze=4;
			$nessunaPrenotazione = true;  //se rimane a true non si ha nessuna preferenze
			for($i=1;$i<$numeroPrefenze;$i+=1)
				if(isset($preferenza["pref_".$i.""]))
					$nessunaPrenotazione = false;    
			if($nessunaPrenotazione)  //se è rimasto true allora non sono state espresse preferenze
				echo "<p>Sembra che tu non abbia mai espresso una preferenza</p>
				<p><a href=galleria.php class=linkbutton>Qui</a> puoi osservare i vari stili ed esprimerne quante ne vuoi"; 
			else{
				for($i=1;$i<$numeroPrefenze;$i+=1){  //se non è vuoto allora lo scorro per mostrare le preferenze
					if(isset($preferenza["pref_".$i.""]))  //se espressa
					echo "<p>Preferenza ".$i.": " . $preferenza["pref_".$i.""] . "<button class=cancbutton onclick='cancellaPreferenza(\"pref_".$i."\", $id_utente)'>Cancella</button></p>";
					else  //se non espressa
					echo "<p>Preferenza ".$i.": non espressa <a href=galleria.php class=cancbutton>Aggiungi</a></p>";
				}
			}
        } 
   	}

	//questo script ha 2 funzioni che vengono chiamate tramite AJAX per cancellare una prenotazione o una preferenza
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["barbiere"]) && isset($_POST["id_prenotazione"])&& isset($_POST["id_utente"])){
			cancellaPrenotazione($_POST["barbiere"],$_POST["id_prenotazione"],$_POST["id_utente"]);
		} else {
			if(isset($_POST["preferenza"])&& isset($_POST["id_utente"])){
				cancellaPreferenza($_POST["preferenza"],$_POST["id_utente"]);	
			}
		}
	}

	function cancellaPrenotazione($barbiere,$id_prenotazione,$id_utente){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;
        $sql = "DELETE FROM $nome_tabella WHERE id_prenotazione = $1";
		$ret=pg_query_params($db, $sql,array($id_prenotazione));
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			pg_close($db);
			getPrenotazioni($id_utente);
			return; 	
		}	
	}

	function cancellaPreferenza($preferenza,$id_utente){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 
		$sql = "UPDATE utenti SET $preferenza = $1 WHERE id_utente = $2";
		$ret=pg_query_params($db, $sql,array(NULL,$id_utente));
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			pg_close($db);
			getPreferenze($id_utente);
			return; 	
		}		
	}
?>