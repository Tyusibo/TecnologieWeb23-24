<!DOCTYPE html>
<?php
session_start();

// Controlla se è stato inviato un modulo con il metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il nuovo valore dal campo di input del modulo
    $_SESSION['username']  = $_POST['username'];

    // Reindirizza o fai altre azioni necessarie
    header('Location: account.php');
    exit();
}
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
    if(empty($_SESSION['username']))
        include 'pagine_ausiliarie/registrati.php';
    else{
        $username = $_SESSION["username"];
        echo "<p> Benvenuto $username!</p>";
    }
    ?>
    
    <script src="script/caricaFooter.js"></script>
</body>
</html>