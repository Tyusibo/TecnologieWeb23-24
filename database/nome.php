<?php
    function getNome($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT nome FROM public.utenti WHERE username=$1;"; 
		$ret=pg_query_params($db, $sql,array($username));
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else
			$row = pg_fetch_assoc($ret);
			pg_close($db);
            return $row['nome']; 		
   	}
?>