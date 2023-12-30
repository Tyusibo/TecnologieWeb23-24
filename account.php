<!DOCTYPE html>
<?php
session_start();

// Controlla se è stato inviato un modulo con il metodo POST

?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Account</title>
    <link rel="stylesheet" type="text/css" href="css/account.css">
</head>
<body>
    <script src="script/caricaHeader.js"></script>
    <?php 
    if(empty($_SESSION['username'])){
        header("Location: registrati.php");
        exit();
    }
    else{
        $username = $_SESSION["username"];
        echo "<p> Benvenuto $username!</p>";
        ?>
        <a href=pagine_ausiliarie/esci.php>Esci</a>;
        <?php 
    }
    ?>
    
    <script src="script/caricaFooter.js"></script>
</body>
</html>