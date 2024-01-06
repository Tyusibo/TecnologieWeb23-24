<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;    
$_SESSION['change']=false;
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
        </div>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.php"; ?> 
    <script src="script/account.js"></script>
    <script src="ajaxScript/esci.js"></script>
</body>
</html>