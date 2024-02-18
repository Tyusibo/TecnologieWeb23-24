<?php
	//questo script contiene 2 funzioni che vengono chiamate tramite AJAX per visualizzare
	//gli orari disponibili oppure per effettuare una prenotazione
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["barbiere"]) && isset($_POST["data"]) && isset($_POST["id_utente"])){
			if(isset($_POST["orario"])){
				setOrario($_POST["barbiere"],$_POST["data"],$_POST["orario"],$_POST["id_utente"]);
			}
			else
				getOrari($_POST["barbiere"],$_POST["data"],$_POST["id_utente"]);
		}		
	}	

	function setOrario($barbiere,$data,$orario,$id_utente){ 
		echo "<button> $barbiere </button>";
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;
		$sql = "INSERT INTO " . $nome_tabella . " (data_appuntamento, orario_appuntamento, id_utente) VALUES ($1,$2,$3);";
		$ret=pg_query_params($db, $sql,array($data,$orario,$id_utente));
		if(!$ret)   
			echo "ERRORE QUERY: " . pg_last_error($db);
		pg_close($db);
		return; 	
	}

    function getOrari($barbiere,$data,$id_utente){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;
		$sql = "SELECT orario_appuntamento FROM " . $nome_tabella . " WHERE data_appuntamento = $1 ORDER BY orario_appuntamento;";
		//prelevo gli orari prenotati (già ordinati per ottimizzare la funzione) per quella data per quel barbiere
		$ret=pg_query_params($db, $sql,array($data));
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
				pg_close($db);

				$orario_inizio = strtotime('09:00');
				$orario_fine = strtotime('18:30');
				$intervallo = 30 * 60; // 30 minuti in secondi
				
				for ($ora = $orario_inizio; $ora <= $orario_fine; $ora += $intervallo) {
					$ora_selezionata = date('H:i', $ora);
					$ora_confronto = date('H:i:s', $ora);
					if (in_array($ora_confronto, $orari_prenotati)) {
						echo '<button class="unavailable" value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';
					} else {
						if($id_utente!=0)
							echo '<button onclick="prenota(event,' . $id_utente . ')" class="available" value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';
						else
							echo '<button onclick="apriPopup()" class="available" value="' . $ora_selezionata . '">' . $ora_selezionata . '</button>';
					}
				}
				return;
			}
   	}
?>