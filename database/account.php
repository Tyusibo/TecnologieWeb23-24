<?php
    function getDati($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT nome,cognome,username,numero FROM public.utenti WHERE username=$1;"; //username è in $_SESSION['username] tecnicamente
		pg_prepare($db, "sqlDati", $sql); 
		$ret = pg_execute($db, "sqlDati", array($username));  
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else
			return pg_fetch_assoc($ret); 		
   	}
	function getPrenotazioni($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		/*
		$sql = "SELECT id,orario_appuntamento,data_appuntamento FROM public.prenotazioni WHERE username=$1;";   //da cambiare
		pg_prepare($db, "sqlPrenotazioni", $sql); 
		$ret = pg_execute($db, "sqlPrenotazioni", array($username));  
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else
			return pg_fetch_assoc($ret); 	
		*/ return false;	
   	}

	function getPreferenze($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		/*
		$sql = "SELECT p1,p2,p3,p4,p5,p6,p7,p8,p9 FROM public.utenti WHERE username=$1;"; 	//da cambiare
		pg_prepare($db, "sqlPreferenze", $sql); 
		$ret = pg_execute($db, "sqlPreferenze", array($username));  
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else{
			$pref['10'];

		} 
		*/ return false;	
   	}
?>