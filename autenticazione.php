<!DOCTYPE html>
<?php
session_start();     
if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST['registrati'])) {// Recupera i valori dai campi di input del form registrati
    $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
    $nome=$_POST['nome']; 
    $cognome=$_POST['cognome']; 
    $username=$_POST['username']; 
    $numero=$_POST['numero']; 
    $pwd=$_POST['pwd1']; 
    $pwd1=$_POST['pwd2'];
    if($_SESSION['redirect']!=null){   //solo se dopo la post redirect è null devo fare il reindirizzamento di default
        header("Location: $_SESSION[redirect]");
    } else 
        header("Location: account.php");
} 
if (isset($_POST['accedi'])) {// Recupera i valori dai campi di input del form accedi
    $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
    $username=$_POST['username']; 
    $pwd=$_POST['pwd']; 
    if (isset($_POST['ricordami']) && $_POST['ricordami'] == 'on') {  //se ricordami è spuntato
        setcookie('nome_utente', $_POST['username'], time() + (30 * 24 * 60 * 60)); // Cookie valido per 30 giorni
    }
    if($_SESSION['redirect']!=null){   //solo se dopo la post redirect è null devo fare il reindirizzamento di default
        header("Location: $_SESSION[redirect]");
    } else 
        header("Location: account.php");
} 
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Registrati</title>
    <link rel="stylesheet" type="text/css" href="css/autenticazione.css">
    <script src="https://kit.fontawesome.com/4a7d362a80.js" crossorigin="anonymous"></script> 
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px; background-color: black"></div>
    <div class="container">    
        <div id="logobox">
            <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
        </div>
        <div class="whitebox">
        <div id="accedi">Accedi
            <form onSubmit="return validaModuloAccedi(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label>Inserisci la tua email<input type="text" size="30" id="usernameAccedi" name="username" value="<?php echo (isset($username)) ? $username : ""; ?>"></label>
                <div id="erroreEmailAccedi" class="errore"></div>
                <label>Inserisci la tua password:<input type="password" size="20" id="pwd" name="pwd" value="<?php echo (isset($pwd)) ? $pwd : ""; ?>">
                <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword('')" id="mostra"></i></label>
                <div id="errorePassword" class="errore"></div>
                <label>Ricorda la mia email: <input type="checkbox" id="ricordami" name="ricordami"></label>
                <input type="submit" id="accedi" name="accedi" value="Accedi">
            </form>
            <p id="registered">Non sei registrato? Premi <button onClick="cambiaModalità(false)">qui</button> per registrati </p>
        </div>

        <div id="registrati" style="display: none";>Registrati
                <form onSubmit="return validaModuloRegistrati(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label>Inserisci il tuo nome: <input type="text" size="15" name="nome" value="<?php echo (isset($nome)) ? $nome : ""; ?>"onkeydown="return soloCaratteri(event)"></label>
                    <div id="erroreNome" class="errore"></div>
                    <label>Inserisci il tuo cognome: <input type="text" size="15" name="cognome" value="<?php echo (isset($cognome)) ? $cognome : ""; ?>"onkeydown="return soloCaratteri(event)"></label>
                    <div id="erroreCognome" class="errore"></div>
                    <label>Inserisci la tua email: <input type="text" size="30" name="username" value="<?php echo (isset($username)) ? $username : ""; ?>"></label>
                    <div id="erroreEmailRegistrati" class="errore"></div>
                    <label>Inserisci il tuo numero <small>(Includi il prefisso)</small>: <input type="text" size="13" name="numero" value="<?php echo (isset($numero)) ? $numero : ""; ?>" onkeydown="return soloNumeri(event)"></label>
                    <div id="erroreNumero" class="errore"></div>
                    <label>Scegli una password, deve contenere almeno: </br><small>
                        <ul id="requisitiPassword" style="display: none;">
                                <li id="minuscola">Una lettera maiuscola</li>
                                <li id="maiuscola">Una lettera minuscola</li>
                                <li id="numero">Un numero</li>
                                <li id="speciale">Un carattere speciale tra [!@#$%^&*(),.?":{}|<>]</li>
                                <li id="lun_min">Essere lunga minimo 8 caratteri</li>
                                <li id="lun_max">Essere lunga massimo 20 caratteri</li>
                        </ul></small>
                    <input type="password" size="20" id="pwd1" name="pwd1" value="<?php echo (isset($pwd)) ? $pwd : ""; ?>" oninput="verificaPassword(event)" onblur="nascondiRequisti(event)">
                    <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword(1)" id="mostra1"></i></label>
                    <div id="errorePassword1" class="errore"></div>
                    <label>Digita la password di conferma:<input type="password" size="20" id="pwd2" name="pwd2" value="<?php echo (isset($pwd1)) ? $pwd1 : ""; ?>">
                    <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword(2)" id="mostra2"></i></label>
                    <div id="errorePassword2" class="errore"></div>
                    <input type="submit" id="registrati" name="registrati" value="Registrati">
                </form>
                <p id="registered">Sei già registrato? Premi <button onClick="cambiaModalità(true)">qui</button> per accedere</p>
            </div>

        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <?php require "footer.html"; ?>
    <script src="script/autenticazione.js" defer></script>
    <script src="script/cookie.js"></script>
</body>
</html>       
