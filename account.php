<!DOCTYPE html>
<?php
session_start();
if(!(isset($_SESSION['redirect']))) //lo faccio per non mettere sempre $_SESSION['redirect']=null; annullando il reindirizzamento di prenota
    $_SESSION['redirect']=null;

 
if ($_SERVER["REQUEST_METHOD"] === 'GET') { /*tramite form con metodo get capisco se è stata effettuata una richiesta di logout e la gestisco*/
    if (isset($_GET['submit'])) {
        session_destroy();
        unset($_SESSION['username']);  //rimuovo gli attributi legati all'autenticazione
        header("Location: account.php");  //per ricreare la sessione e inizializzare i valori
    }
    
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {// Recupera il nuovo valore dal campo di input del modulo
    $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
    $username=$_SESSION['username'];
    $pwd=$_POST['pwd']; 
    if($_SESSION['redirect']!=null){   //se dopo la post, redirect non è null la richiesta proviene da prenota.php
        header("Location: prenota.php");
    } 
} else {   //altrimenti se si è caricata la pagina per la prima volta e non tramite post self, inizializzo il valore dei campi per non generare errori
    $username=null;
    $pwd=null; 
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
    <?php require "header.html"; ?>
    <div style="height: 100px; background-color: black"></div> <!--lo stile per mostrare il contenuto dopo l'header e perchè i cazzoni mettono il css nei documenti php-->
    <div class="container">
        <div id="logobox">
            <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
        </div>
        <div class="whitebox">
            <div id="accedi">Accedi</div>
            <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label>Inserisci la tua email<input type="text" size="30" id="username" name="username" value="<?php echo $username ?>"/></label>
                <div id="erroreEmail" class="errore"></div>
                <label>Inserisci la tua password:<input type="password" size="20" id="pwd" name="pwd" value="<?php echo $pwd?>">
                <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword()" id="mostra"></i></label>
                <div id="errorePassword" class="errore"></div>
                <input type="submit" value="Invia">
            </form>
        <?php 
        if(!(isset($_SESSION['username']))){  //se non loggato
            ?>   
            <p id="notregistered">Non sei registrato? Premi <a href="registrati.php">qui</a> per registrarti.</p>
        
    <?php
    }
    else{  //se loggato
        echo "<p>Benvenuto $_SESSION[username] !";?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
			<input type="submit"  name="submit" id="submit" value="Esci">
        </form>
        <?php 
    }
    ?>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    
    <?php require "footer.html"; ?>
</body>
</html>