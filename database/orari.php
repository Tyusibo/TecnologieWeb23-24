<?php
	session_start();
	$data=$_POST["data"];
	getOrari($data);
    function getOrari($data){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome=$_SESSION['barber'];
		$nome_tabella = "prenotazioni_" . $nome;
		$sql = "SELECT orario_appuntamento FROM " . $nome_tabella . " WHERE data_appuntamento=$1;";
		$ret=pg_query_params($db, $sql,array($data));
		$orario_inizio = strtotime('09:00');
		$orario_fine = strtotime('19:00');
		$intervallo = 30 * 60; // 30 minuti in secondi
		if(!$ret) { 
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{   //se la query va a buon fine
			if ($row = pg_fetch_assoc($ret)){   //se ha trovato una password la restituisce
				for ($ora = $orario_inizio; $ora <= $orario_fine; $ora += $intervallo) {
					$ora_selezionata = date('H:i', $ora);
					echo '<button value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';  
				}
				pg_close($db);
				return;
			}
			else{  //se non ha trovato una password ritorna false, il chè significa che era l'utente a non esistere sul database
				for ($ora = $orario_inizio; $ora <= $orario_fine; $ora += $intervallo) {
					$ora_selezionata = date('H:i', $ora);
					echo '<button value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';  
				}
				pg_close($db);
				return;
			}
   		}
   	}
?>