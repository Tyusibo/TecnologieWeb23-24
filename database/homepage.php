<?php
	function getPreferenze($username){ 
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
            $numero_immagini=6;
            $preferenze_espresse=0;
			$numeroPrefenze=4;
			$nome = array();
			while($i<$numeroPrefenze){
				if(isset($row["pref_".$i.""])){
					$stile[$preferenze_espresse]=$row["pref_".$i.""];    
                    $preferenze_espresse+=1;
				}
                $i+=1;
            }  
			if($preferenze_espresse==0){
                echo"<img src=img/barber_bg.jpeg alt=Immagine 1>";
                echo"<img src=img/barber_bg.jpeg alt=Immagine 2>";
                echo"<img src=img/barber_bg.jpeg alt=Immagine 3>";
                echo"<img src=img/barber_bg.jpeg alt=Immagine 4>";
                echo"<img src=img/barber_bg.jpeg alt=Immagine 5>";
                echo"<img src=img/barber_bg.jpeg alt=Immagine 6>"; 
            }
			else{
				$i=0;
                $preferenze_per_tipo=$numero_immagini/$preferenze_espresse;
				while($i<$preferenze_espresse){
                        for($j=0;$j<=$preferenze_per_tipo;$j++){
                            echo '<img src="img/gallery/'.$stile[$i].'/img'.$j.'.jpg" >' ;
                        }
                        $i+=1;   
                    }
				}
                pg_close($db);
                return;
			}
        } 
?>