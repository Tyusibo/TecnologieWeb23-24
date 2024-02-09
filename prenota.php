<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;  
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Prenota</title>  
    <link rel="stylesheet" type="text/css" href="css/prenota.css">
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px"></div>
    <?php
    if(empty($_SESSION['username'])){  //se non loggato ?>
        <p>Pagina riservata agli utenti autenticati. <br/> 
            Effettua l'<button id="accedi">accesso</button> oppure la <button id="registrati">registrazione</button> per continuare.
        </p>
        <?php } else /*se loggato*/if ($_SERVER["REQUEST_METHOD"] == "POST") {  //se hai effettuato una prenotazione ?>
                <p>Prenotazione effettuata con successo!
                    Clicca <a href="prenota.php">qui</a> per effettuarne un'altra
                    oppure vai al tuo <a href="account.php">account</a> per gestire le tue prenotazioni.
                </p>
                <?php } else {  //se loggato ma non ha ancora effettuato una prenotazione
                    echo "<p>Ciao $_SESSION[username] !";?>    
                    <p>Scegli il tuo barbiere</p>
                    <button id="andrea">Andrea</button>
                    <button id="rocco">Rocco</button>
                    <button id="francesco">Francesco</button>
                    <div id="datePicker" style="display: none;">
                        <?php $data=date("Y-m-d"); /*fa vedere il formato giusto*/ ?>  
                        <input type="date" onchange=orari() id="date" value="<?php echo $data ?>" name="data" min="<?php echo date('d-m-Y'); ?>" max="<?php echo date('d-m-Y', strtotime('+1 week')); ?> ">
                    </div>
                    <div id="orari"></div> <!--Gli orari si possono gestire nel css con .orari ul-->
                        
        <?php } //parentesi dell'else ?>  
    
    <?php require "footer.php";?>
    <script src="ajax/redirect.js"></script>
    <script src="ajax/prenotazione.js"></script>
</body>
</html>