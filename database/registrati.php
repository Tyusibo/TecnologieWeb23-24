<?php
    function username_exist($username){
        require "connectionString.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $sql = "SELECT username FROM public.utenti WHERE username=$1;"; 
        $username = pg_escape_literal($username);
        $ret=pg_query_params($db, $sql,array($username));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false; 
        }
        else{
            if (pg_fetch_assoc($ret)){ 
                pg_close($db);
                return true;
            }
            else{
                pg_close($db);
                return false;
            }
        }
    }
    function insert_utente($nome, $cognome, $numero, $username, $pwd){
        require "connectionString.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $sql = "INSERT INTO public.utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3)
                        VALUES($1, $2, $3, $4, $5, NULL, NULL, NULL); ";
        /*$nome = pg_escape_literal($nome);
        $cognome = pg_escape_literal($cognome);
        $numero = pg_escape_literal($numero);
        $username = pg_escape_literal($username);
        $pwd = pg_escape_literal($pwd);
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);*/
        $ret=pg_query_params($db, $sql,array($nome, $cognome, $numero, $username, $hashed_pwd));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false; 
        }
        else{
            pg_close($db);
            return true;
        }
    }
?>