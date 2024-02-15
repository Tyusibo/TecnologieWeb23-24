<?php
session_start(); //essenziale per usare $_SESSION['username'] in setPreferenza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["preferenza"])){
        $preferenza=$_POST["preferenza"];
        if(isset($_POST["username"])){
            $id=$_POST["id"];
            setPreferenza($preferenza,$id);
        }
        controllaPreferenza($preferenza);
    }
}	

function setPreferenza($preferenza){ 
    $disponibile=preferenzePiene();

    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "UPDATE utenti SET $disponibile = '$1' WHERE username = '$2'";
    $ret=pg_query_params($db, $sql,array($preferenza, $_SESSION['username']));

    if(!$ret)   
        echo "ERRORE QUERY: " . pg_last_error($db);
    pg_close($db);
    return; 
}

function controllaPreferenza($preferenza){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 
    $sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE username=$1;";
    $ret=pg_query_params($db, $sql,array($_SESSION['username']));
    if(!$ret){
        echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
        return;    
    } else {
        $row = pg_fetch_assoc($ret);
        $i=1;
        while($i<4){
            if(($row["pref_" . $i])==$preferenza){
                echo "true";
                pg_close($db);
                return;
                }
            $i+=1;
        }
        echo "false";
        pg_close($db);
        return;
    }
}

function preferenzePiene(){ 
    $disponibile=preferenzePiene();
    if($disponibile==4)
            echo "false";  //è possibile prenotare
         else 
            echo "true";   //non è possibile prenotare
} 




function preferenzaDisponibile(){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE username=$1;";
    $ret=pg_query_params($db, $sql,array($_SESSION['username']));

    if(!$ret){
        echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
        return;    
    } else {
        $row = pg_fetch_assoc($ret);
        $i=1;
        while($i<4){
            if(is_null($row["pref_" . $i])){
                break;
                }
            $i+=1;
        }
        pg_close($db);
        return ($i);   //torno la prima preferenza disponibile che incontro se i vale 4 sono tutte occupate
    }
}
?>