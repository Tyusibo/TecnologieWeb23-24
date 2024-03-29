<?php
function prelevaPreferenze($id_utente){ 
		require "connectionString.php"; 
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());  

		$sql = "SELECT pref_1,pref_2,pref_3 FROM utenti WHERE id_utente=$1;";
		$ret=pg_query_params($db, $sql,array($id_utente)); 
		if(!$ret) {     
			echo "ERRORE QUERY: " . pg_last_error($db);
			pg_close($db);
			return false; 
		}
		else{  
            $preferenze = pg_fetch_assoc($ret);
			pg_close($db);
			$i=1;
            $preferenze_espresse=0;  //inizializzo il contatore delle preferenze espresse
			$numeroPrefenze=4;
			$stile = array();  //creo il vettore dove inserirò le preferenze non nulle dell'utente
			while($i<$numeroPrefenze){
				if(isset($preferenze["pref_".$i.""])){
					$stile[$preferenze_espresse]=$preferenze["pref_".$i.""];    
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
	);  //creo una matrice dove il singolo vettore è l'insieme dei valori randomici della singola preferenza dell'utente
	for($i=0;$i<$numero_immagini;$i+=1){
		$pos=$i%$preferenze_espresse; //per scorrere a rotazione le preferenze
		do {
			$immagine_casuale=rand(1,5);
		} while (in_array($immagine_casuale, $random[$pos]));  //controllo se l'immagine casuale della preferenza in questione è già stata caricata
		$random[$pos][$i]=$immagine_casuale;  //salvo la nuova immagine randomica per essere sicuro di non ripeterla
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