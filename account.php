<!DOCTYPE html>
<?php
session_start(); 
if(!(isset($_SESSION['username'])))  //se non loggato porta ad autenticazione
    header("Location: autenticazione.php"); 
require "database/account.php";
require "database/id.php"; 
$id=getId($_SESSION['username']);  
$_SESSION['redirect']=null;   //lo fa ogni pagina a eccezione di autenticazione.php  
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
            <div id="contenuti"> 
                <section id="lista">
                    <?php 
                    $nome=getNome($_SESSION["username"]);  //getNome è incluso da header.php ed è presente in database/nome
                    echo "<h3>Benvenuto $nome!</h3>";
                    ?>
                    <nav>
                        <ul>
                            <li><p id="dati">I miei dati</p></li>
                            <li><p id="prenotazioni">Le mie prenotazioni</p></li>
                            <li><p class="space" id="preferenze">Le mie preferenze</p></li>
                            <div class="space"></div>
                            <li><p><button class="accbutton" id="esciAccount">Log out</button></p></li> 
                        </ul>
                    </nav>           
                </section>
                <hr>
                <section id="sezioni"> 
                    <section id="sezioneDati">
                        <?php getDati($id);?>
                    </section>
                    <section id="sezionePrenotazioni">
                        <?php getPrenotazioni($id);?>
                    </section>
                    <section id="sezionePreferenze">
                        <?php getPreferenze($id);?>
                    </section>
                </section>
            </div>
        </div> 
    </div>
    <?php require "footer.php"; ?> 
    <script src="script/account.js"></script>
    <?php
    if(isset($_SESSION['prenota'])){  //se è settato vuol dire che si proviene da prenota e si vogliono visualizzare le prenotazioni
        ?> <script>sezioni(2)</script> 
        <?php unset($_SESSION['prenota']);  /* per non creare bug */  }   
    if(isset($_SESSION['preferenza'])){  //se è settato vuol dire che si proviene da galleria e si vogliono visualizzare le preferenze
        ?> <script>sezioni(3)</script> 
        <?php unset($_SESSION['prenota']);  /* per non creare bug */  }
    ?> 
</body>
</html>