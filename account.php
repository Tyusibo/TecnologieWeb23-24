<!DOCTYPE html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    if (isset($_GET['submit'])) {
        session_destroy();
        unset($_SESSION['username']);
        session_start();
    }
    
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il nuovo valore dal campo di input del modulo
    $_SESSION['username'] = $_POST['username'];  //mi serve solo questo di globale per sapere nelle altre pagine se sono loggato
    $username=$_SESSION['username'];
    $password=$_POST['pwd']; 
} else {
    $username=null;
    $password=null;
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
    <div id=accedi>Accesso
        <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">Username
			<input type="text" name="username" id="username" value="<?php echo $username ?>"/></label>
            <div id="erroreEmail" class="errore"></div>
            </br>
            </label>
            <label>Inserisci la password:
            <input type="password" id="pwd" name="pwd" value="<?php echo $password?>">
            <i class="fa-sharp fa-solid fa-mustache" onclick="mostraPassword()" id="mostra"></i></label>
            <div id="errorePassword" class="errore"></div>
            <input type="submit" value="Invia">
            </br>
        </form>
    <?php 
    if(empty($_SESSION['username'])){
        ?>   
        <p>Non sei registrato? Premi <a href="registrati.php">qui</a> per registrarti.</p>
    </div>
    <?php
    }
    else{
        $username = $_SESSION["username"];
        echo "<p> Benvenuto $username!</p>";
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
			<input type="submit" name="submit" value="Esci">
        </form>
        <?php 
    }
    ?>
    
    <?php require "footer.html"; ?>
</body>
</html>