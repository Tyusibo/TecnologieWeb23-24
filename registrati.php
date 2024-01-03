<!DOCTYPE html>
<?php
session_start();
if(!(isset($_SESSION['redirect'])))  //lo faccio per non mettere sempre $_SESSION['redirect']=null; annullando il reindirizzamento di prenota
    $_SESSION['redirect']=null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {// Recupera il nuovo valore dal campo di input del modulo
    $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
    $nome=$_POST['nome']; 
    $cognome=$_POST['cognome']; 
    $username=$_SESSION['username'];
    $numero=$_POST['numero']; 
    $password1=$_POST['pwd1']; 
    $password2=$_POST['pwd2'];
    if($_SESSION['redirect']!=null){   //se dopo la post, redirect non è null la richiesta proviene da prenota.php
        header("Location: prenota.php");
    } 
} else {   //altrimenti se si è caricata la pagina per la prima volta e non tramite post self, inizializzo il valore dei campi per non generare errori
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
<body>
    <?php require "header.html"; ?>
    <div style="height: 100px; background-color: black"></div> <!--lo stile per mostrare il contenuto dopo l'header e perchè i cazzoni mettono il css nei documenti php-->    <div class="container">
    <div class="container">    
        <div id="logobox">
            <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
        </div>
        <div class="whitebox">
            <div id="registrati">Registrati</div>
                <form onSubmit="return validaModulo(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label>Inserisci il tuo nome: <input type="text" size="15" name="nome" value="<?php echo $nome?>"onkeydown="return soloCaratteri(event)"></label>
                    <div id="erroreNome" class="errore"></div>
                    <label>Inserisci il tuo cognome: <input type="text" size="15" name="cognome" value="<?php echo $cognome?>"onkeydown="return soloCaratteri(event)"></label>
                    <div id="erroreCognome" class="errore"></div>
                    <label>Inserisci la tua email: <input type="text" size="30" name="username" value="<?php echo $username?>"></label>
                    <div id="erroreEmail" class="errore"></div>
                    <label>Inserisci il tuo numero <small>(Includi il prefisso)</small>: <input type="text" size="13" name="numero" value="<?php echo $numero?>" onkeydown="return soloNumeri(event)"></label>
                    <div id="erroreNumero" class="errore"></div>
                    <label>Scegli una password, deve contenere almeno: </br><small>
                        <ul>
                                <li id="minuscola">Una lettera maiuscola</li>
                                <li id="maiuscola">Una lettera minuscola</li>
                                <li id="numero">Un numero</li>
                                <li id="speciale">Un carattere speciale tra [!@#$%^&*(),.?":{}|<>]</li>
                                <li id="lun_min">Essere lunga minimo 8 caratteri</li>
                                <li id="lun_max">Essere lunga massimo 20 caratteri</li>
                        </ul></small>
                    <input type="password" size="20" id="pwd1" name="pwd1" value="<?php echo $password1?>" oninput="verificaPassword(event)">
                    <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword(1)" id="mostra1"></i></label>
                    <div id="errorePassword1" class="errore"></div>
                    <label>Digita la password di conferma:<input type="password" size="20" id="pwd2" name="pwd2" value="<?php echo $password2?>">
                    <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword(2)" id="mostra2"></i></label>
                    <div id="errorePassword2" class="errore"></div>
                    <input type="submit" value="Registrati">
                </form>
    <?php 
    if(isset($_SESSION['username'])){  //se sei loggato 
        ?>   
        <p>Per andare al tuo account clicca <a href="account.php">qui</a>.</p>
    <?php
    } else {   //se non sei loggato
        echo "<p id=registered>Sei già registrato? Premi <a href=account.php>qui</a> per effettuare l'accesso.</p>";
    }
    ?>
        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.html"; ?>
</body>
</html>       
