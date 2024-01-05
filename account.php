<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;  //valore di default che mi fa capire che in autenticazione.php non devo fare redirect particolari
$_SESSION['change']=false;  //valori di default che mi fa capire che in autenticazione.php devo mostrare la parte del 
//login e non quella della registrazione(true)
//entrambe le variabili non vengono alterate in autenticazione.php ma vengono inizializzate in ogni altra pagina
if(!(isset($_SESSION['username'])))  //se non loggato
    header("Location: autenticazione.php"); 
?>
<html lang="it">
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
        <section id="lista">
            <?php echo "<p>Benvenuto $_SESSION[username] !";?>
            <p id="dati">I miei dati</p> 
            <p id="prenotazioni">Le mie prenotazioni</p>  
            <p id="preferenze">Le mie preferenze</p> 
            <p id="esci">Premi <button id="esci">qui</button> per uscire</p>            
        </section>
        <div id="contenuti">
        Varia in base a quello premuto
        </div>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.php"; ?> 
    <script src="ajax/esci.js"></script>
</body>
</html>