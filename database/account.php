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
			echo "<div class=\"flexdati\">";
			echo "<p>Il tuo nome: $dati[nome]</p>";
			echo "<p>Il tuo cognome: $dati[cognome]</p>";
			echo "<p>La tua email:  $dati[username]</p>";
			echo "<p>Il tuo numero: $dati[numero]</p>";
			echo "</div>";
			return; 	
		}	
   	}

	function getPrenotazioni($id_utente){ 
		$nome = array("andrea","rocco","francesco");  //per scorrere tutte e 3 le tabelle di tutti e 3 i barbieri
	   	$nessunaPrenotazione = true;  //se rimane a false non si ha una prenotazione con nessun barbiere
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
					$nessunaPrenotazione=false;  //messo almeno una volta a true significa che esistono prenotazioni
					echo "<div class=\"flexbarber\">";
					echo "<div>Barbiere:&nbsp;</div><div class=\"barber\">$barbiere</div>";  //stampo il nome del barbiere una volta
					echo "</div>";
					echo "<div class=\"flexcards\">";
					while ($prenotazione = pg_fetch_assoc($ret)) {
						echo "<div class=\"card\">";
							echo "<div>Data: " . date("d-m-Y", strtotime($prenotazione["data_appuntamento"])) . "</div>";
							echo "<div>Orario: " . substr($prenotazione["orario_appuntamento"], 0, 5) . "</div>"; 
							 //substr per rimuovere i secondi, nel database è salvato in secondi
							echo "<button class=accbutton 
							onclick='cancellaPrenotazione(\"" . $barbiere . "\", \"" . $prenotazione["id_prenotazione"] . "\", \"" . $id_utente . "\")'>
							Cancella</button>";
							//la funzione cancellaPrenotazione ha bisogno di sapere il barbiere (quale tabella) e quale id, sia prenotazione che utente
						echo "</div>";
					}
					echo "</div>";
				}	
			}          
		} 
		if ($nessunaPrenotazione) {  //se non si ha una prenotazione per nemmeno un barbiere
			echo "<p>Non hai effetuato prenotazioni</p>";
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
			$numeroPrefenze=4;
			$nessunaPrenotazione = true;  //se rimane a true non si ha nessuna preferenze
			for($i=1;$i<$numeroPrefenze;$i+=1)
				if(isset($preferenza["pref_".$i.""]))
					$nessunaPrenotazione = false;    
			if($nessunaPrenotazione){  //se è rimasto true allora non sono state espresse preferenze
				echo "<p>Non hai preferenze espresse</p>";
				echo "<p><a href=galleria.php class=linkbutton>Qui</a> puoi osservare i vari stili ed esprimerne fino a 3"; 
			}
			else{
				echo "<div class=\"flexprefesterno\">";
				for($i=1;$i<$numeroPrefenze;$i+=1){
					if(isset($preferenza["pref_".$i.""])){  //se espressa
						echo "<div class=\"flexprefinterno\">";
						echo "<div>Preferenza ".$i.": " . $preferenza["pref_".$i.""] . "</div>";
						echo "<button class=accbutton 
						onclick='cancellaPreferenza(\"pref_".$i."\", $id_utente)'>Cancella</button>";
						echo "</div>";
					}
					else{  //se non espressa
						echo "<div class=\"flexprefinterno\">";
						echo "<div>Preferenza ".$i.": NON ESPRESSA</div>";
						echo "<a href=galleria.php class=accbutton>Aggiungi</a>";
						echo "</div>";
					}
				}
				echo "</div>";
			}
        } 
   	}

	//sotto sono presenti 2 funzioni che vengono chiamate tramite AJAX per cancellare una prenotazione o una preferenza
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["barbiere"]) && isset($_POST["id_prenotazione"] )&& isset($_POST["id_utente"])){
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
			getPrenotazioni($id_utente);  //per riaggiornare la schermata
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
			getPreferenze($id_utente);  //per riaggiornare la schermata
			return; 	
		}		
	}
?>