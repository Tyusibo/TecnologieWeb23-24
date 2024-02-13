<?php
    function getDati($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT nome,cognome,username,numero FROM public.utenti WHERE username=$1;"; //username è in $_SESSION['username] tecnicamente
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
		pg_close($db);
		if(pg_num_rows($ret)==0)
			return false;
		return $ret;	
   	}
	

	

	function getPreferenze($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		/*
		$sql = "SELECT p1,p2,p3,p4,p5,p6,p7,p8,p9 FROM public.utenti WHERE username=$1;"; 	//da cambiare
		$ret=pg_query_params($db, $sql,array($username)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{
			pg_close($db);
			$pref['10'];

		} 
		*/ return false;	
   	}
?>