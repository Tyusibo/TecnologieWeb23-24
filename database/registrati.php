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
?>