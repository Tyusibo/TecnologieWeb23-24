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
    if($_SESSION['redirect']!=null){
        header("Location: prenota.php");
    } 
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
    <script src="script/registrati.js" defer></script>
    <script src="https://kit.fontawesome.com/4a7d362a80.js" crossorigin="anonymous"></script>
<body style="padding: 0px;">
    <?php require "header.html"; ?>
    <div style="height: 100px"></div>
    
        <div id=registrati>Registrati
            <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label>Inserisci il tuo nome:<input type="text" size="15" name="nome" value="<?php echo $nome?>"onkeydown="return soloCaratteri(event)"></label>
                <div id="erroreNome" class="errore"></div>
                <label>Inserisci il tuo cognome:<input type="text" size="15" name="cognome" value="<?php echo $cognome?>"onkeydown="return soloCaratteri(event)"></label>
                <div id="erroreCognome" class="errore"></div>
                </br>
                <label>Inserisci la tua email: <input type="text" size="25" name="username" value="<?php echo $username?>"></label>
                <div id="erroreEmail" class="errore"></div>
                <label>Inserisci il tuo numero: <input type="text" size="13" name="numero" value="<?php echo $numero?>" onkeydown="return soloNumeri(event)"></label>
                <div id="erroreNumero" class="errore"></div>
                </br>
                <label><small>Scegli una password, deve contenere almeno: </br>
                una lettera maiuscola, una lettera minuscola,un numero, un carattere speciale tra [!@#$%^&*(),.?":{}|<>] e</br>
                essere lunga minimo 8 caratteri e non più di 20:</small><input type="password" size="20" id="pwd1" name="pwd1" value="<?php echo $password1?>" >
                <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword(1)" id="mostra1"></i></label>
                <div id="errorePassword1" class="errore"></div>
                <label>Digita la password di conferma:<input type="password" size="20" id="pwd2" name="pwd2" value="<?php echo $password2?>">
                <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword(2)" id="mostra2"></i></label>
                <div id="errorePassword2" class="errore"></div>
                </br>
                <input type="submit" value="Invia">
                <input type="reset" value="Annulla">
            </form>
    </div> 
    <p>Sei già registrato? Premi <a href="account.php">qui</a> per effettuare l'accesso.</p>
    <?php 
    if(!(empty($_SESSION['username']))){
        ?>   
        <p>Per andare al tuo account clicca <a href="account.php">qui</a>.</p>
    </div>
    <?php
    }
    ?>
    <?php require "footer.html"; ?>
</body>
</html>       
