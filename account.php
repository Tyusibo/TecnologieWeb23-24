<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;
if (($_SERVER["REQUEST_METHOD"] === 'GET') && (isset($_GET['esci']))) { /*tramite form con metodo get capisco se è stata effettuata una richiesta di logout e la gestisco*/
        session_destroy();
        header("Location: homepage.php");  //per ricreare la sessione e inizializzare i valori
        unset($_SESSION['username']);  //rimuovo gli attributi legati all'autenticazione
        $x=false; //Se non faccio così dopo l'unset di $_SESSION['username'] mi farà sempre header("Location: autenticazione.php"); 
}
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Account</title>
    <link rel="stylesheet" type="text/css" href="css/account.css">
    <script src="script/account.js" defer></script>
    
    <script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px; background-color: black"></div> <!--lo stile per mostrare il contenuto dopo l'header e perchè i cazzoni mettono il css nei documenti php-->
    <div class="container">
        <div id="logobox">
            <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
        </div>
        <div class="whitebox">
        <?php 
        if((!(isset($_SESSION['username']))) && (!(isset($x)))){  //se non loggato  
           header("Location: autenticazione.php"); 
    }
    else{  //se loggato
        echo "<p>Benvenuto $_SESSION[username] !";?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
			<input type="submit"  name="esci" id="esci" value="Esci">
        </form>
        <?php 
    }
    ?>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    
    <?php require "footer.html"; ?>
       
</body>
</html>