<?php
    function getDati($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT nome,cognome,username,numero FROM public.utenti WHERE username=$1;"; 
		$ret=pg_query_params($db, $sql,array($username)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			$row=pg_fetch_assoc($ret); 
			echo "<p>Il tuo nome: $row[nome]</p>";
			echo "<p>Il tuo cognome: $row[cognome]</p>";
			echo "<p>La tua email:  $row[username]</p>";
			echo "<p>Il tuo numero: $row[numero]</p>";
			pg_close($db);
			return; 	
		}	
   	}

	function getPrenotazioni($id){ 
		$nome = array("andrea","rocco","francesco");
	   	$nessunaPrenotazione = false;
		$data_odierna = date('Y-m-d'); 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
		foreach ($nome as $barbiere) {
			$nome_tabella = "prenotazioni_" . $barbiere;
            $sql = "SELECT id_prenotazione, data_appuntamento,orario_appuntamento FROM " . $nome_tabella . "  WHERE id_utente=$1 AND data_appuntamento >= $2  ORDER BY data_appuntamento, orario_appuntamento;";
			$ret=pg_query_params($db, $sql,array($id,$data_odierna));
			if(!$ret) {     
				echo "ERRORE QUERY: " . pg_last_error($db);
				pg_close($db);
				return false; 
			}
			else{
				if(pg_num_rows($ret)!=0){
					$nessunaPrenotazione=true;
					echo "<p>Barbiere: $barbiere</p>";
					echo "<div class=\"flex\">";
					while ($row = pg_fetch_assoc($ret)) {
						echo "<div class=\"card\">";
						echo "<p>Data: " . $row["data_appuntamento"] . "</p>";
						echo "<p>Orario: " . substr($row["orario_appuntamento"], 0, 5) . "</p>";
						echo "<button class=\"cancbutton\" onclick='cancellaPrenotazione(\"" . $barbiere . "\", \"" . $row["id_prenotazione"] . "\")'>Cancella</button>";
						echo "</div>";
					}
					echo "</div>";
				}	
			}          
		} 
		pg_close($db);
		if (!$nessunaPrenotazione) {
			echo "<p>Sembra che tu non abbia effettuato neanche una prenotazione</p>";
			echo "<p><a href='prenota.php'>Qui</a> puoi effettuarne una</p>";
		}	
   	}
	
	function getPreferenze($id){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE id_utente=$1;";
		$ret=pg_query_params($db, $sql,array($id)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{  
            $row = pg_fetch_assoc($ret);
			$i=1;
			$numeroPrefenze=4;
			$nome = array();
			while($i<$numeroPrefenze){
				if(isset($row["pref_".$i.""]))
					$nome[$i]=$i;    
				$i+=1;
				}  
			if(empty($nome))
				echo "<p>Sembra che tu non abbia mai espresso una preferenza</p>
				<p><a href=galleria.php>Qui</a> puoi osservare i vari stili ed esprimerne quante ne vuoi"; 
			else{
				$i=1;
				while($i<$numeroPrefenze){
					if(isset($row["pref_".$i.""]))
					echo "<p>Preferenza ".$i.": " . $row["pref_".$i.""] . "<button onclick='cancellaPreferenza(\"pref_".$i."\", $id)'>Cancella</button></p>";
					else
					echo "<p>Preferenza ".$i.": non espressa <button onclick='cancellaPreferenza(\"pref_".$i."\", $id)'>Cancella</button></p>";
					$i+=1;
				}
			}
        } 
   	}

	
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["barbiere"])&& isset($_POST["id"])){
			$barbiere=$_POST["barbiere"];
			$id=$_POST["id"];
			cancellaPrenotazione($barbiere,$id);
		} else {
			if(isset($_POST["preferenza"])&& isset($_POST["id"])){
				$preferenza=$_POST["preferenza"];
				$id=$_POST["id"];
				cancellaPreferenza($preferenza,$id);	
			}
		}
	}

	function cancellaPrenotazione($barbiere,$id){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;
        $sql = "DELETE FROM $nome_tabella WHERE id_prenotazione = $1";
		$ret=pg_query_params($db, $sql,array($id));
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			pg_close($db);
			getPrenotazioni(1);
			return; 	
		}	
	}

	function cancellaPreferenza($preferenza,$id){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 
		$sql = "UPDATE utenti SET $preferenza = $1 WHERE id_utente = $2";
		$ret=pg_query_params($db, $sql,array(NULL,$id));
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			getPreferenze($id);
			pg_close($db);
			return; 	
		}		
	}
?>