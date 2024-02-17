<!DOCTYPE html>
<?php
session_start(); 
require "database/account.php";
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
                    echo "<p>Benvenuto $nome!";?>
                    <nav>
                        <ul>
                            <li><p id="dati">I miei dati</p></li>
                            <li><p id="prenotazioni">Le mie prenotazioni</p></li>
                            <li><p id="preferenze">Le mie preferenze</p></li>
                            <li><p id="esciAccount">Premi <button class="linkbutton" id="esci">qui</button> per uscire</p></li> 
                        </ul>
                    </nav>           
                </section>
                <section id="sezioni"> 
                    <section id="sezioneDati">
                        <?php getDati($_SESSION["username"]);?>
                    </section>
                    <section id="sezionePrenotazioni">
                    <?php
                    getPrenotazioni($id);
                    ?>
                    </section>
                    <section id="sezionePreferenze">
                        <?php getPreferenze($id);
                        ?>
                    </section>
                </section>
            </div>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.php"; ?> 
    <script src="script/account.js"></script>
    <script src="pagineAusiliarie/esci.js"></script>  


    <?php
    if(isset($_SESSION['prenota'])){
        ?> <script>sezioni(2)</script> 
        
        <?php
        unset($_SESSION['prenota']);
    }   ?> 
    
</body>
</html>