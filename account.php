<!DOCTYPE html>
<?php
session_start();
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
    if(empty($_SESSION['username'])){
        ?>
        <div id=accedi>Accedi
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">Username
			<input type="text" name="username" id="username"/></label>
            </br>
            </label>
            <label>Inserisci la password:
            <input type="password" name="pwd1"></label>
            </br>
            <input type="submit" value="Invia">
            </br>
            <input type="reset" value="Annulla">
        </form>
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
    
    <script src="script/caricaFooter.js"></script>
</body>
</html>