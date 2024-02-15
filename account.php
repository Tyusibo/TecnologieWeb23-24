<!DOCTYPE html>
<?php
session_start(); 
require "database/account.php";
require "database/nome.php";
require "database/id.php"; 
$id=getId($_SESSION['username']);
$_SESSION['redirect']=null;     
if(!(isset($_SESSION['username'])))  //se non loggato
    header("Location: autenticazione.php"); 
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Account</title>
    <link rel="stylesheet" type="text/css" href="css/account.css">
</head>
<body>
    <?php require "header.php"; ?>
    <div class="container">
        <div class="whitebox">
            <div id="contenuti">  <!--Voglio che la section id lista sta sempre a sinistra e quello dopo sta alla sua destra-->
                <section id="lista">
                    <?php 
                    $nome=getNome($_SESSION["username"]);
                    echo "<p>Benvenuto $nome !";?>
                    <nav>
                        <ul>
                            <li><p id="dati">I miei dati</p></li>
                            <li><p id="prenotazioni">Le mie prenotazioni</p></li>
                            <li><p id="preferenze">Le mie preferenze</p></li>
                            <li><p id="esci">Premi <button id="esci">qui</button> per uscire</p></li> 
                        </ul>
                    </nav>           
                </section>
                <section id="sezioni">  <!--Per ora ho messo che questa sezione che le contiene tutte ed è float:right-->
                    <section id="sezioneDati">
                        <?php $dati=getDati($_SESSION["username"]);?>
                        <p>Il tuo nome: <?php echo $dati['nome'];?></p>
                        <p>Il tuo cognome: <?php echo $dati['cognome'];?></p>
                        <p>La tua email: <?php echo $dati['username'];?></p>
                        <p>Il tuo numero: <?php echo $dati['numero'];?></p>
                    </section>
                    <section id="sezionePrenotazioni">
                    <?php
                    $nome = array("andrea","rocco","francesco");
                    $nessunaPrenotazione = true;

                    foreach ($nome as $barbiere) {
                        $prenotazioni = getPrenotazioni($id, $barbiere);
                        if($prenotazioni){
                            $nessunaPrenotazione=false;
                            echo "<p>Barbiere: $barbiere</p>";
                            while ($row = pg_fetch_assoc($prenotazioni)) {
                                echo "<p>Data: " . $row["data_appuntamento"] . "</p>";
                                echo "<p>Orario: " . substr($row["orario_appuntamento"], 0, 5) . "</p>";
                                echo "<button onclick='cancellaPrenotazione(\"" . $barbiere . "\", \"" . $row["id_prenotazione"] . "\")'>Cancella</button>";
                            }
                        }
                    }


                    if ($nessunaPrenotazione) {
                        echo "<p>Sembra che tu non abbia effettuato neanche una prenotazione</p>";
                        echo "<p><a href='prenota.php'>Qui</a> puoi effettuarne una</p>";
                    }
                    ?>
                    </section>
                    <section id="sezionePreferenze">
                        <?php $preferenze=getPreferenze($_SESSION["username"]);
                        if($preferenze==false){
                            echo "<p>Sembra che tu non abbia mai espresso una preferenza</p>
                            <p><a href=galleria.php>Qui</a> puoi osservare i vari stili ed esprimerne quante ne vuoi";
                        } else {
                            $nessunaPreferenza=true;
                            $i=1;
                            $numeroPrefenze=4;
                            while($i<$numeroPrefenze){
                            echo "<p>Preferenza ".$i.": " . (isset($preferenze["pref_".$i.""]) ? $preferenze["pref_".$i.""] : "non espressa") . "<button onclick='cancellaPreferenza(\"pref_".$i."\", $id)'>Cancella</button></p>"
                            ;
                            $i+=1;
                            }                 
                        }
                        ?>
                    </section>
                </section>
            </div>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.php"; ?> 
    <script src="script/account.js"></script>
    <script src="ajax/esci.js"></script>
</body>
</html>