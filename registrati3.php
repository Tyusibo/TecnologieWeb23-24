<!DOCTYPE html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il nuovo valore dal campo di input del modulo
    $_SESSION['username']  = $_POST['username'];
    $nome=$_POST['nome']; 
    $cognome=$_POST['cognome']; 
    $username=$_SESSION['username'];
    $numero=$_POST['numero']; 
    $password1=$_POST['pwd1']; 
    $password2=$_POST['pwd2']; 
} else {
    $nome=null; 
    $cognome=null; 
    $username=null;
    $numero=null; 
    $password1=null; 
    $password2=null;  
}
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Registrati</title>
    <link rel="stylesheet" type="text/css" href="css/registrati.css">
    <script src="script/registrati3.js" defer></script>
<body>
    <?php include "header.html"; ?>
    <script src="script/StickyHeader.js"></script>
    
        <div id=registrati>Registrati
            <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label>Inserisci il tuo nome:<input type="text" size="30" name="nome" value="<?php echo $nome?>"></label>
                <label>Inserisci il tuo cognome:<input type="text" size="30" name="cognome" value="<?php echo $cognome?>"></label>
                </br>
                <label>Inserisci l'email: 
                <input type="text" name="username" value="<?php echo $username?>">
                <label>Inserisci il numero: 
                <input type="text" name="numero" value="<?php echo $numero?>"
                 size="12"onkeydown="return soloNumeri(event)" title="Il codice contiene solo numeri">
                </label>
                </br>
                <label>Scegli una password, deve contenere almeno: </br>
                una lettera maiuscola, un carattere speciale e  </br>
                essere lunga minimo 8 caratteri e non più di 20:<input type="password" id="pwd1" name="pwd1" value="<?php echo $password1?>"></label>
                <input type="checkbox" id="mostra1" onchange="mostraPassword(1)"> Mostra password </br>
                <label>Inseriscila la password di conferma:<input type="password" id="pwd2"name="pwd2" value="<?php echo $password2?>"></label>
                <input type="checkbox" id="mostra2" onchange="mostraPassword(2)"> Mostra password </br>
                </br>
                <input type="submit" value="Invia">
                <input type="reset" value="Annulla">
            </form>
    </div> 
    <?php 
    if(!(empty($_SESSION['username']))){
        ?>   
        <p>Per andare al tuo account clicca <a href="account.php">qui</a>.</p>
    </div>
    <?php
    }
    ?>
    <div id="footerContainer"><?php include "footer.html"; ?></div>
</body>
</html>       
