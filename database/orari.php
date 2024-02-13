<?php
	session_start();
	$data=$_POST["data"];
	if(isset($_POST["orario"])){
		$orario=$_POST["orario"];
		setOrario($data,$orario);
	}
	else
		getOrari($data);

	function setOrario($data,$orario){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome=$_SESSION['barber'];
		$nome_tabella = "prenotazioni_" . $nome;

		$sql = "INSERT INTO " . $nome_tabella . " (data_appuntamento, orario_appuntamento, messaggio, id_utente) VALUES ($1,$2,$3,$4);";
		$sql_utente = "SELECT id_utente FROM utenti WHERE username=$1;"; 
		$ret_utente=pg_query_params($db, $sql_utente,array($_SESSION['username']));
		

		$row = pg_fetch_assoc($ret_utente);
		
		$ret=pg_query_params($db, $sql,array($data,$orario,"messaggio",$row["id_utente"]));
		

		pg_close($db);
		return ; 
		
	}

    function getOrari($data){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome=$_SESSION['barber'];
		$nome_tabella = "prenotazioni_" . $nome;
		$sql = "SELECT orario_appuntamento FROM " . $nome_tabella . " WHERE data_appuntamento = $1 ORDER BY orario_appuntamento;";
		$ret=pg_query_params($db, $sql,array($data));
		$orario_inizio = strtotime('09:00');
		$orario_fine = strtotime('19:00');
		$intervallo = 30 * 60; // 30 minuti in secondi
		if(!$ret) { 
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{   //ci sono prenotazioni in quel giorno
			

				$orari_prenotati = array();
				while ($row = pg_fetch_assoc($ret)) {
					$orari_prenotati[] = $row['orario_appuntamento'];
				}
				
				for ($ora = $orario_inizio; $ora <= $orario_fine; $ora += $intervallo) {
					$ora_selezionata = date('H:i', $ora);
					$ora_confronto = date('H:i:s', $ora);
					$flag = false;
					if (in_array($ora_confronto, $orari_prenotati)) {
						echo '<button class="red" value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';
					} else {
						echo '<button onclick="prenota(event)" class="yellow" value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';  
					}
				}
				pg_close($db);
				return;
			}
			
   		
   	}
?>