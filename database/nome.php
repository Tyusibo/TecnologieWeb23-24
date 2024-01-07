<?php
    function getNome($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT nome FROM public.utenti WHERE username=$1;"; 
		pg_prepare($db, "sqlNome", $sql); 
		$ret = pg_execute($db, "sqlNome", array($username));  
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else
			$row = pg_fetch_assoc($ret);
            return $row['nome']; 		
   	}
?>