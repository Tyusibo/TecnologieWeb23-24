<!DOCTYPE html>
<?php
session_start(); 
if(!(isset($_SESSION['username'])))  //se non loggato porta ad autenticazione
    header("Location: autenticazione.php"); 
require "database/account.php";
require "database/id.php"; 
$id_utente = isset($_SESSION['username']) ? getId($_SESSION['username']) : 0;  //anche se in questa pagina $_SESSION["username] è sempre settato
$_SESSION['redirect']=null;   //lo fa ogni pagina a eccezione di autenticazione.php  
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Account</title>
    <link rel="stylesheet" type="text/css" href="css/account.css">
    <link rel="icon" href="img/icon.png" type="image/png"/>
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
                            <li><p class="active" id="dati">I miei dati</p></li>
                            <li><p id="prenotazioni">Le mie prenotazioni</p></li>
                            <li><p id="preferenze">Le mie preferenze</p></li>
                            <li class="space"></li>
                            <li><button class="accbutton" id="esciAccount">Log out</button></li> 
                        </ul>
                    </nav>           
                </section>
                <hr>
                <section id="sezioni"> 
                    <section id="sezioneDati">
                        <?php getDati($id_utente);?>
                    </section>
                    <section id="sezionePrenotazioni">
                        <?php getPrenotazioni($id_utente);?>
                    </section>
                    <section id="sezionePreferenze">
                        <?php getPreferenze($id_utente);?>
                    </section>
                </section>
            </div>
        </div> 
    </div>
    <?php require "footer.php"; ?> 
    <script src="script/account.js"></script>
    <?php
    if(isset($_SESSION['prenota'])){  //se è settato vuol dire che si proviene da prenota e si vogliono visualizzare le prenotazioni
        ?> <script>sezioni("prenotazioni",2)</script> 
        <?php unset($_SESSION['prenota']);  /* per non creare bug */  }   
    ?> 
</body>
</html>