<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;  //valore di default che mi fa capire che in autenticazione.php non devo fare redirect particolari
$_SESSION['change']=false;  //valori di default che mi fa capire che in autenticazione.php devo mostrare la parte del 
//login e non quella della registrazione(true)
//entrambe le variabili non vengono alterate in autenticazione.php ma vengono inizializzate in ogni altra pagina
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Galleria</title>
    <link rel="stylesheet" type="text/css" href="css/galleria.css">
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px"></div>
    <?php require "footer.php"; ?>
</body>
</html>