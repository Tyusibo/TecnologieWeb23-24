<?php
    function get_pwd($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT password_hash FROM utenti WHERE username=$1;";  //prende la password dell'utente passato come parametro salvata nel database
		//$username = pg_escape_literal($username);
		$ret=pg_query_params($db, $sql,array($username));
		if(!$ret) {      //se la query non va a buon fine
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{   //se la query va a buon fine
			if ($row = pg_fetch_assoc($ret)){   //se ha trovato una password la restituisce
				$stored_hash = $row['password_hash'];
				pg_close($db);
				return $stored_hash;
			}
			else{  //se non ha trovato una password ritorna false, il chè significa che era l'utente a non esistere sul database
				pg_close($db);
				return false;
			}
   		}
   	}
?>