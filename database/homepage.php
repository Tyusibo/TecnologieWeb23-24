<?php
function prelevaPreferenze($username){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  

		$sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE username=$1;";
		$ret=pg_query_params($db, $sql,array($username)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{  
            $row = pg_fetch_assoc($ret);
			$i=1;
            $preferenze_espresse=0;
			$numeroPrefenze=4;
			$stile = array();
			while($i<$numeroPrefenze){
				if(isset($row["pref_".$i.""])){
					$stile[$preferenze_espresse]=$row["pref_".$i.""];    
                    $preferenze_espresse+=1;
				}
                $i+=1;
            }  
			return $stile;
		}
}
function contenutiPersonalizzati($stile,$preferenze_espresse){
	$numero_immagini=5;
	$random = array(
		array(),
		array(),
		array()
	);
	for($i=0;$i<$numero_immagini;$i+=1){
		$pos=$i%$preferenze_espresse; //per scorrere a rotazione le preferenze
		do {
			$immagine_casuale=rand(1,5);
		} while (in_array($immagine_casuale, $random[$pos]));
		$random[$pos][$i]=$immagine_casuale;
		echo '<img src="img/gallery/'.$stile[$pos].'/img'.$immagine_casuale.'.jpg" >' ;
		} 
	return;
}

function nessunaPreferenza(){
	$numero_immagini=5;
	$stili = array("BUZZ CUT","FRENCH CROP","CURTAINS","SIDE PART","MOHAWK");
	for($i = 0; $i<$numero_immagini; $i++)
			echo '<img  src="img/gallery/'.$stili[$i].'/img'.rand(1,5).'.jpg" >' ;
}
?>