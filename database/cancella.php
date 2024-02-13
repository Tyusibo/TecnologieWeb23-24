<?php
	if(isset($_POST["id"])){
        $barbiere=$_POST["barbiere"];
		$id=$_POST["id"];
		cancellaPrenotazione($barbiere,$id);
	}

	function cancellaPrenotazione($barbiere,$id){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  
		$nome_tabella = "prenotazioni_" . $barbiere;

        $sql = "DELETE FROM $nome_tabella WHERE id_prenotazione = $1";
				
		$ret=pg_query_params($db, $sql,array($id));
		

		pg_close($db);
		return ; 
		
	}

?>