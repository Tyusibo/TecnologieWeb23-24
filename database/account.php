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
			pg_close($db);
			return pg_fetch_assoc($ret); 	
		}	
   	}

	function getPrenotazioni($id,$barbiere){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 
		$nome_tabella = "prenotazioni_" . $barbiere;
		$sql = "SELECT id_prenotazione, data_appuntamento,orario_appuntamento FROM " . $nome_tabella . "  WHERE id_utente = $1 ORDER BY data_appuntamento, orario_appuntamento;";
		$ret=pg_query_params($db, $sql,array($id));
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			if(pg_num_rows($ret)==0)
				return false;
			pg_close($db);
			return $ret;	
		}
			
   	}
	
	function getPreferenze($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE username=$1;";
		$ret=pg_query_params($db, $sql,array($username)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{  
            $row = pg_fetch_assoc($ret);
			$i=1;
			while($i<4){
				if(is_null($row["pref_" . $i])){
					unset($row['pref_' . $i]);
					break;
					}
				$i+=1;
			}
			pg_close($db);
			if(empty($row))
				return false;
			return $row;
        } 
   	}
	
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST["barbiere"])&& isset($_POST["id"])){
			$barbiere=$_POST["barbiere"];
			$id=$_POST["id"];
			cancellaPrenotazione($barbiere,$id);
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
			return; 	
		}		
	}
?>