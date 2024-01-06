<?php
    function username_exist($username){
        require "connectionString.php";
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