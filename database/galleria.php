<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        if(isset($_POST["preferenza"])){
            $preferenza=$_POST["preferenza"];
            if($_POST["mode"]=="aggiungi")
                setPreferenza($id,$preferenza);
            else
                rimuoviPreferenza($id,$preferenza);
        }
        controllaPreferenze($id);
    }
}	

function setPreferenza($id,$preferenza){ 
    $disponibile=preferenzaDisponibile($id);
    if($disponibile==4){
        echo "full";
        exit;
    }
    $pref = "pref_" . $disponibile;
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 
    
    $sql = "UPDATE utenti SET $pref = $1 WHERE id_utente = $2";
    $ret=pg_query_params($db, $sql,array($preferenza, $id));

    if(!$ret)   
        echo "ERRORE QUERY: " . pg_last_error($db);
    pg_close($db);
    return; 
}

function rimuoviPreferenza($id, $preferenza){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error()); 
    $sql = "UPDATE utenti 
            SET pref_1 = CASE WHEN pref_1 = $2 THEN $1 ELSE pref_1 END,
                pref_2 = CASE WHEN pref_2 = $2 THEN $1 ELSE pref_2 END,
                pref_3 = CASE WHEN pref_3 = $2 THEN $1 ELSE pref_3 END
            WHERE id_utente = $3";    
    $ret = pg_query_params($db, $sql, array(NULL, $preferenza, $id));
    if(!$ret)    
        echo "ERRORE QUERY: " . pg_last_error($db);
    pg_close($db);
    return ; 
}


function controllaPreferenze($id){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE id_utente=$1;";
    $ret=pg_query_params($db, $sql,array($id));
    if(!$ret){
        echo "ERRORE QUERY: " . pg_last_error($db);
        pg_close($db);
        return;    
    } else {
        $row = pg_fetch_assoc($ret);
        $i=1;
        while($i<4){
            if((isset($row["pref_" . $i]))){
                echo $row["pref_" . $i];
                echo "\n";
                }
            $i+=1;
        }
        pg_close($db);
        return;
    }
}

function preferenzaDisponibile($id){ 
    require "connectionString.php"; 
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error()); 

    $sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE id_utente=$1;";
    $ret=pg_query_params($db, $sql,array($id));

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