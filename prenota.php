<!DOCTYPE html>
<?php
session_start();
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Prenota</title>
    <link rel="stylesheet" type="text/css" href="css/prenota.css">
</head>
<body>
    <script src="script/caricaHeader.js"></script>
    <?php
    if(empty($_SESSION['username'])){
        echo "<p>Pagina riservata agli utenti registrati. <br/> Effettua <a
        href=\"account.php\">qui </a> il Login oppure la registrazione per continuare</p>";
        } else {
            include 'pagine_ausiliarie/prenotazione.php';
        }
    ?>
    
    <script src="script/caricaFooter.js"></script> 
</body>
</html>