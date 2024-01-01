<!DOCTYPE html>
<?php
session_start();
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
</head>
<body>
    <?php include "header.html"; ?>
    <script src="script/StickyHeader.js"></script>
    <div id=accedi>Accesso
        <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">Username
			<input type="text" name="username" id="username" value="<?php echo $username ?>"/></label>
            </br>
            </label>
            <label>Inserisci la password:
            <input type="password" id="pwd" name="pwd" value="<?php echo $password?>"></label>
            <input type="checkbox" id="mostra" onchange="mostraPassword()"> Mostra password </br>
            </br>
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
        <a href=pagine_ausiliarie/esci.php>Esci</a>;
        <?php 
    }
    ?>
    
    <div id="footerContainer"><?php include "footer.html"; ?></div>
</body>
</html>