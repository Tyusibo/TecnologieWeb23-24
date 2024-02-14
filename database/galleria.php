UPDATE utenti
SET pref_1 = 'nuovo_valore'
WHERE username = 'andrea';
<?php
session_start(); //essenziale per usare $_SESSION['username'] in setPreferenza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["preferenza"])){
        $preferenza=$_POST["preferenza"];
        setPreferenza($preferenza);
    }	
    else
        preferenzePiene($username);	
}	

function setPreferenza($preferenza){ 
    $disponibile=controllaPreferenze($_SESSION['username']);
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "UPDATE utenti SET $disponibile = '$1' WHERE username = '$2'";
    $ret=pg_query_params($db, $sql,array($preferenza, $_SESSION['username']));
    if(!$ret)   
        echo "ERRORE QUERY: " . pg_last_error($db);
    pg_close($db);
    return; 
    
}

function controllaPreferenze($preferenza){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "UPDATE utenti SET pref_1 = '$1' WHERE username = '$2'";
    $ret=pg_query_params($db, $sql,array($preferenza, $_SESSION['username']));
    if(!$ret)   
        echo "ERRORE QUERY: " . pg_last_error($db);
    pg_close($db);
    return;    
}

function preferenzePiene($username){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "SELECT pref_3 FROM utenti WHERE username=$1;";
    $ret=pg_query_params($db, $sql,array($_SESSION['username']));
    if(!$ret){ 
        echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
        return;   
    }
    else {
        $row = pg_fetch_assoc($ret);
        pg_close($db);
        if(is_null($row["pref_3"]))
            return true;  //è possibile prenotare
        return false;   //non è possibile prenotare
    } 
}
?>