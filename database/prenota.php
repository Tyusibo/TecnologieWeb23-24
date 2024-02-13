<?php
	session_start(); //essenziale per usare $_SESSION['username'] in setOrario
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["barbiere"])&& isset($_POST["data"])){
			$barbiere=$_POST["barbiere"];
			$data=$_POST["data"];
			if(isset($_POST["orario"])){
				$orario=$_POST["orario"];
				setOrario($barbiere,$data,$orario);
			}
			else
				getOrari($barbiere,$data);
		}		
	}	

	function setOrario($barbiere,$data,$orario){ 
		require "id.php"; 
		$id=getId(($_SESSION['username']));
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;
		$sql = "INSERT INTO " . $nome_tabella . " (data_appuntamento, orario_appuntamento, messaggio, id_utente) VALUES ($1,$2,$3,$4);";
		$ret=pg_query_params($db, $sql,array($data,$orario,"messaggio",$id));
		if(!$ret)   
			echo "ERRORE QUERY: " . pg_last_error($db);
		pg_close($db);
		return; 
		
	}

    function getOrari($barbiere,$data){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;
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
		else{ 
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
						echo '<button onclick="prenota(event)" class="green" value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';  
					}
				}
				pg_close($db);
				return;
			}
			
   		
   	}
?>