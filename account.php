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
    if (isset($_POST['ricordami']) && $_POST['ricordami'] == 'on') {
        setcookie('nome_utente', $username, time() + (30 * 24 * 60 * 60)); // Cookie valido per 30 giorni
        setcookie('password', $pwd, time() + (30 * 24 * 60 * 60));
    }
    if($_SESSION['redirect']!=null){   //se dopo la post, redirect non è null la richiesta proviene da prenota.php
        header("Location: $_SESSION[redirect]");
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
    <?php require "header.php"; ?>
    <div style="height: 100px; background-color: black"></div> <!--lo stile per mostrare il contenuto dopo l'header e perchè i cazzoni mettono il css nei documenti php-->
    <div class="container">
        <div id="logobox">
            <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
        </div>
        <div class="whitebox">
        <?php 
        if(!(isset($_SESSION['username']))){  //se non loggato
            ?>   
            <div id="accedi">Accedi</div>
            <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label>Inserisci la tua email<input type="text" size="30" id="username" name="username" value=""/></label>
                <div id="erroreEmail" class="errore"></div>
                <label>Inserisci la tua password:<input type="password" size="20" id="pwd" name="pwd" value="">
                <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword()" id="mostra"></i></label>
                <div id="errorePassword" class="errore"></div>
                <label>Ricordami<input type="checkbox" id="ricordami" name="ricordami"></label>
                <input type="submit" value="Invia">
            </form>
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
    <script src="script/cookie.js"></script>     
</body>
</html>