<?php
    function get_pwd($username){ // se metto $user si prende quello di db_conncection
   		require "db_connection.php";
   		//CONNESSIONE AL DB
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
		$sql = "SELECT password_hash FROM utenti WHERE username=$1;";
		$prep = pg_prepare($db, "sqlPassword", $sql); 
		$ret = pg_execute($db, "sqlPassword", array($username));
		if(!$ret) {
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else{
			if ($row = pg_fetch_assoc($ret)){ 
				$stored_hash = $row['password_hash'];
				return $stored_hash;
			}
			else{
				return false;
			}
   		}
   	}
    function username_exist($username){
        require "db_connection.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $sql = "SELECT username FROM public.utenti WHERE username=$1;";
        $prep = pg_prepare($db, "sqlUsername", $sql);
        $ret = pg_execute($db, "sqlUsername", array($username));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            return false; 
        }
        else{
            if ($row = pg_fetch_assoc($ret)){ 
                return true;
            }
            else{
                return false;
            }
        }

    }
    function insert_utente($nome, $cognome, $numero, $username, $pwd){
        require "db_connection.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO public.utenti(nome, cognome, numero, username, password_hash)
                        VALUES($1, $2, $3, $4, $5); ";
        $prep = pg_prepare($db, "insertUser", $sql);
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