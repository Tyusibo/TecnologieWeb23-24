<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;
if (isset($_GET['esci'])) { /*Se è stata effettuata una richiesta di logout la gestisco*/
        session_destroy();
        header("Location: homepage.php");  //rendirizzo a homepage, che sarà lui a ricreare la sessione e inizializzare i valori
        unset($_SESSION['username']);  //rimuovo gli attributi legati all'autenticazione
        $redirect=false; //Se non faccio così dopo l'unset di $_SESSION['username'] mi farà sempre header("Location: autenticazione.php"); di riga 26
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
    <?php require "header.php"; ?>
    <div class="container">
        <div class="whitebox">
            <?php 
            if((!(isset($_SESSION['username']))) && (!(isset($redirect))))  //se non loggato e $redirect mi serve per capire se devo andare su 
                //autenticazione o ignorarlo perchè devo andare su homepage
            header("Location: autenticazione.php"); 
            else{  //se loggato
                echo "<p>Benvenuto $_SESSION[username] !";?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">  <!--form per gestire il log out-->
                    <input type="submit" name="esci" id="esci" value="Esci">
                </form>
                <?php 
            }
            ?>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.html"; ?> 
</body>
</html>