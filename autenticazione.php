<!DOCTYPE html>
<?php
session_start(); 
if(isset($_SESSION['change'])){  //messo a true solo da script ajax esterni a questo file
    ?><script src="script/cambiaModalità.js"></script>
    <?php
    unset($_SESSION['change']);  //per non creare bug
}
//unica pagina che non dove alterariore SESSION[redirect] e [change]
if (isset($_POST['reg'])) { //Se è stato premuto il submit del form registrati
    require "database/registrati.php";  
    $nome=$_POST['nome'];   // Recupera i valori dai campi di input del form registrati
    $cognome=$_POST['cognome']; 
    $username=$_POST['username']; //username e pwd hanno gli stessi nomi delle variabili per l'accesso per mantenere i valori
    $numero=$_POST['numero']; 
    $pwd=$_POST['pwd1']; 
    $pwd1=$_POST['pwd2'];

    if(username_exist($username)){  //controllo se l'username già esiste
        ?><script src="script/emailRegistrata.js"></script><?php
        if($_SESSION['change']==true){
            ?><script src="script/cambiaModalità.js"></script><?php
        }
    }else{  //se non esiste lo inserisco
        if(insert_utente($nome, $cognome, $numero, $username, $pwd)){
            if($_SESSION['redirect']!=null){   //se non è null, contiene la pagina a cui reindirizzare
                header("Location: $_SESSION[redirect]");
            } else 
                header("Location: account.php");  //altrimenti riporta ad account (comportamento di default)
            $_SESSION['username']  = $username;  //per rendere effettiva l'autenticazione anche nelle altre pagine
        }
    }
} 

if (isset($_POST['acc'])) {//analogamente per accedi
    require "database/accedi.php"; 
    $username= $_POST['username']; 
    $pwd= $_POST['pwd']; 
    $stored_hash_pwd = get_pwd($username);  //provo a prelevare la password dell'utente con email fornita
    if(!$stored_hash_pwd){  //se mi trovo nel then vuol dire che l'utente non era registrato
        ?><script src="script/emailNonRegistrata.js"></script><?php
    }else{  //l'utente era registrato e quindi devo controllare la password
        if(password_verify($pwd, $stored_hash_pwd)){  //se è vero allora devo autenticare l'utente
            if (isset($_POST['ricordami']) && $_POST['ricordami'] == 'on') {  //se ricordami è spuntato setto il cookie
                setcookie('nome_utente', $_POST['username'], time() + (30 * 24 * 60 * 60)); //valido per 30 giorni
            }
            if(isset($_SESSION['redirect'])){  
                header("Location: $_SESSION[redirect]");
            } else 
                header("Location: account.php");
            $_SESSION['username']  = $_POST['username'];  
        }else{  //l'utente era registrato, ma la password fornita non coincide con quella salvata sul database
            ?><script src="script/passwordErrata.js"></script><?php
        }
    }  
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
    <div class="container">    
        <div class="whitebox">
            <div id="accedi">
                <h3 class="title">Accedi</h3>
                <form id="accediForm" onSubmit="return validaModuloAccedi(this)" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="verticalflex">   
                        <label for="usernameAccedi">Email</label>
                        <input class="textinput" type="text" size="30" id="usernameAccedi" name="username" value="<?php echo (isset($username)) ? $username : ""; ?>">
                        <div id="erroreEmailAccedi" class="errore"></div>
                        <label class="spaced" for="pwd">Password</label>
                        <div class="horizontalflex">
                            <input class="textinput grow" type="password" size="20" id="pwd" name="pwd" value="<?php echo (isset($pwd)) ? $pwd : ""; ?>">
                            <i class="fa-sharp fa-solid fa-eye" id="mostra"></i>
                        </div>
                        <div id="errorePassword" class="errore"></div>
                        <div style="margin-bottom:20px;" class="spaced horizontalflex">
                            <label for="ricordami">Ricorda la mia email</label>
                            <input type="checkbox" id="ricordami" name="ricordami">
                        </div>
                        <input class="btn" type="submit" id="acc" name="acc" value="Accedi">
                    </div> 
                </form>
                <p>Non sei registrato?<button class="linkbutton" id="cliccaqui1">Registrati</button></p>
                <script src="script/accedi.js"></script>
            </div>
            <div id="registrati">
                <h3 class="title">Registrati</h3>
                <form id="registratiForm" onSubmit="return validaModuloRegistrati(this)" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="verticalflex">
                        <label>Nome</label>
                        <input class="textinput" type="text" size="15" id="nome" name="nome" value="<?php echo (isset($nome)) ? $nome : ""; ?>">
                        <div id="erroreNome" class="errore"></div>
                        <label class="spaced">Cognome</label>
                        <input class="textinput" type="text" size="15" id="cognome" name="cognome" value="<?php echo (isset($cognome)) ? $cognome : ""; ?>">
                        <div id="erroreCognome" class="errore"></div>
                        <label class="spaced">Email</label>
                        <input class="textinput" type="text" size="30" id="username" name="username" value="<?php echo (isset($username)) ? $username : ""; ?>">
                        <div id="erroreEmailRegistrati" class="errore"></div>
                        <label class="spaced">Numero<small>(Includi il prefisso)</small></label>
                        <input class="textinput" type="text" size="13" id="numero" name="numero" value="<?php echo (isset($numero)) ? $numero : ""; ?>" onkeydown="return soloNumeri(event)">
                        <div id="erroreNumero" class="errore"></div>
                        <label class="spaced">Scegli una password, deve contenere almeno: </label>
                        <small>
                            <ul id="requisitiPassword">
                                <li id="minuscola">Una lettera maiuscola</li>
                                <li id="maiuscola">Una lettera minuscola</li>
                                <li id="numero">Un numero</li>
                                <li id="speciale">Un carattere speciale tra [!@#$%^&*(),.?":{}|<>]</li>
                                <li id="lun_min">Essere lunga minimo 8 caratteri</li>
                                <li id="lun_max">Essere lunga massimo 20 caratteri</li>
                            </ul>
                        </small>
                        <div class="horizontalflex">
                            <input class="textinput grow" type="password" size="20" id="pwd1" name="pwd1" value="<?php echo (isset($pwd)) ? $pwd : ""; ?>">
                            <i class="fa-sharp fa-solid fa-eye" id="mostra1"></i>
                        </div>
                        <div id="errorePassword1" class="errore"></div>
                        <label class="spaced">Digita la password di conferma:</label>
                        <div class="horizontalflex">
                            <input class="textinput grow" type="password" size="20" id="pwd2" name="pwd2" value="<?php echo (isset($pwd1)) ? $pwd1 : ""; ?>">
                            <i class="fa-sharp fa-solid fa-eye" id="mostra2"></i>
                        </div>
                        <div id="errorePassword2" class="errore"></div>
                        <div style="margin-bottom:20px; width:100%"></div> <!--PLACEHOLDER può essere sostituito-->
                        <input class="btn" type="submit" id="reg" name="reg" value="Registrati">
                    </div> 
                </form>
                <div class="horizontalflex spaced">
                    <p>Sei già registrato?<button class="linkbutton" id="cliccaqui2">Accedi</button></p>
                    <script src="script/registrati.js" defer></script>
                </div>
            </div>
        </div>  <!--Devo chiudere i 2 div container e whitebox-->
    </div>
    <script src="script/autenticazione.js"></script> 
    <?php require "footer.php";?>
</body>
</html>       

