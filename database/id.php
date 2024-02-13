<?php
    function getId($username){ 
        require "connectionString.php"; 
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 
        $sql = "SELECT id_utente FROM utenti WHERE username=$1;";  
        $ret_utente=pg_query_params($db, $sql,array($username));
        $row=pg_fetch_assoc($ret_utente);
        return $row["id_utente"];
        }
?>