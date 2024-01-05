<?php
    function get_pwd($username){ 
   		require "dbConnection.php";  
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$sql = "SELECT password_hash FROM utenti WHERE username=$1;";  //prende la password dell'utente passato come parametro salvata nel database
		pg_prepare($db, "sqlPassword", $sql); //prepara la query e le da il nome sqlPassword
		$ret = pg_execute($db, "sqlPassword", array($username));  //esegue la query con il nome sqlPassword sul parametro fornito
		if(!$ret) {      //se la query non va a buon fine
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else{   //se la query va a buon fine
			if ($row = pg_fetch_assoc($ret)){   //se ha trovato una password la restituisce
				$stored_hash = $row['password_hash'];
				return $stored_hash;
			}
			else{  //se non ha trovato una password ritorna false, il chè significa che era l'utente a non esistere sul database
				return false;
			}
   		}
   	}
    function username_exist($username){
        require "dbConnection.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $sql = "SELECT username FROM public.utenti WHERE username=$1;"; 
        pg_prepare($db, "sqlUsername", $sql);
        $ret = pg_execute($db, "sqlUsername", array($username));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            return false; 
        }
        else{
            if (pg_fetch_assoc($ret)){ 
                return true;
            }
            else{
                return false;
            }
        }
    }
    function insert_utente($nome, $cognome, $numero, $username, $pwd){
        require "dbConnection.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO public.utenti(nome, cognome, numero, username, password_hash)
                        VALUES($1, $2, $3, $4, $5); ";
        pg_prepare($db, "insertUser", $sql);
        $ret = pg_execute($db, "insertUser", array($nome, $cognome, $numero, $username, $hashed_pwd));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            return false; 
        }
        else{
            return true;
        }
    }
?>