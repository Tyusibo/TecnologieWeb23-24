<?php
    function getPassword($username){ 
        require "connectionString.php"; 
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  

        $sql = "SELECT password_hash FROM utenti WHERE username=$1;";  
        $ret=pg_query_params($db, $sql,array($username));
        if(!$ret) {    
            echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false; 
        }
        else{  
            if ($password = pg_fetch_assoc($ret)){ //se ha trovato una password la restituisce
                pg_close($db);
                return $password['password_hash'];
            }
            else{  //se non ha trovato una password ritorna false, significa che non esiste
                //nessun utente nel database con quella email
                pg_close($db);
                return false;
            }
        }
    }

    function userExists($username,$numero){
        require "connectionString.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

        $sql = "SELECT username,numero FROM utenti WHERE username=$1 OR numero=$2;"; 
        $ret=pg_query_params($db, $sql,array($username,$numero));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false; 
        }
        else{
            $error=array();
            while ($utente = pg_fetch_assoc($ret)) {  //scorro il risultato della query perchè ci possono essere 2 utenti:
                //può essere un utente con quell'username e un utente con quel numero o lo stesso con entrambi
                if($utente["username"]==$username) 
                    $error["username"]=true;

                if($utente["numero"]==$numero)
                    $error["numero"]=true;
            }
            pg_close($db);
            return $error;
        }
    }
    
    function insertUtente($nome, $cognome, $numero, $username, $pwd){
        $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

        require "connectionString.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());

        $sql = "INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3)
                        VALUES($1, $2, $3, $4, $5, NULL, NULL, NULL); ";
        $ret=pg_query_params($db, $sql,array($nome, $cognome, $numero, $username, $hashedPassword));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            pg_close($db);
            return false;
        } else {
            pg_close($db);
            return true;
        }
    }
?>