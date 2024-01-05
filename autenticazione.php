<!DOCTYPE html>
<?php
session_start();
if (isset($_POST['reg'])) {// Recupera i valori dai campi di input del form registrati
    require "database/autenticazioneDatabase.php";  //Includo le funzioni database solo se serve
    $nome=$_POST['nome']; 
    $cognome=$_POST['cognome']; 
    $username=$_POST['username']; 
    $numero=$_POST['numero']; 
    $pwd=$_POST['pwd1']; 
    $pwd1=$_POST['pwd2'];

    //check se l'username(email) già esiste
    if(username_exist($username)){  //se già esiste
        $_SESSION['change']=true;   //per andare in modalità registrazione
        $_SESSION['error']='alreadyRegistered';  //messaggio di errore
    }else{  //se non esiste lo inserisco
        if(insert_utente($nome, $cognome, $numero, $username, $pwd)){
            if($_SESSION['redirect']!=null){   //solo se dopo la post redirect è null devo fare il reindirizzamento di default
                header("Location: $_SESSION[redirect]");
            } else 
                header("Location: account.php");
            $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
        }else  //se ha restituito false è fallita
            echo "utente non inserito FAIL! ";
    }
} 

if (isset($_POST['acc'])) {// Recupera i valori dai campi di input del form accedi
    require "database/autenticazioneDatabase.php";  //Includo le funzioni database solo se serve
    $username= $_POST['username']; 
    $pwd= $_POST['pwd']; 

    $stored_hash_pwd = get_pwd($username);  //prelevo la password dell'utente con email fornita
    if(!$stored_hash_pwd){  //se mi trovo nel then vuol dire che l'utente non era registrato
        $_SESSION['error']='notRegistered'; //messaggio di errore
    }else{  //l'utente era registrato e quindi devo controllare la password
        if(password_verify($pwd, $stored_hash_pwd)){  //se è vero allora devo autenticare l'utente
            if (isset($_POST['ricordami']) && $_POST['ricordami'] == 'on') {  //se ricordami è spuntato
                setcookie('nome_utente', $_POST['username'], time() + (30 * 24 * 60 * 60)); // Cookie valido per 30 giorni
            }
            if($_SESSION['redirect']!=null){   //solo se dopo la post redirect è null devo fare il reindirizzamento di default altrimenti quello stabilito
                header("Location: $_SESSION[redirect]");
            } else 
                header("Location: account.php");
            $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
        }else{
            $_SESSION['error']='invalidPassword';  //messaggio di errore
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
                <form onSubmit="return validaModuloAccedi(this);" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="verticalflex">   
                        <label for="usernameAccedi">Email</label>
                        <input class="textinput" type="text" size="30" id="usernameAccedi" name="username" value="<?php echo (isset($username)) ? $username : ""; ?>">
                        <div id="erroreEmailAccedi" class="errore"></div>
                        <label style="margin-top:10px;" for="pwd">Password</label>
                        <div class="horizontalflex">
                            <input class="textinput" type="password" size="20" id="pwd" name="pwd" value="<?php echo (isset($pwd)) ? $pwd : ""; ?>">
                            <i class="fa-sharp fa-solid fa-eye" onclick="mostraPassword('')" id="mostra"></i>
                        </div>
                        <div id="errorePassword" class="errore"></div>
                        <div style="margin-top:10px; margin-bottom:20px;"class="horizontalflex">
                            <label for="ricordami">Ricorda la mia email</label>
                            <input type="checkbox" id="ricordami" name="ricordami">
                        </div>
                        <input class="btn" type="submit" id="acc" name="acc" value="Accedi">
                    </div> 
                </form>
                <p id="registered">Non sei registrato?<button id="cliccaqui" onClick="cambiaModalità(false)">Registrati</button></p>
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
                        <ul id="requisitiPassword" >
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
                    <input type="submit" id="reg" name="reg" value="Registrati">
                </form>
                <p id="registered">Sei già registrato? Premi <button onClick="cambiaModalità(true)">qui</button> per accedere</p>
            </div>

        </div>  <!--Devo chiudere i 2 div-->
    </div>
    <script src="script/cookie.js"></script> 
    <script src="script/autenticazione.js"></script> <!--Non posso aggiungere defer perchè altrimenti
    le istruzioni sottostanti genererebbero un'errore dovuto al fatto di non conoscere la funzione cambiaModalità()-->
    <?php
    if($_SESSION['change']==true){  //valore impostato a true solo se si vuole accedere alla parte della registrazione di autenticazione.php
    ?><script>
    cambiaModalità(false);
    </script><?php
    } 
    require "footer.php"; 
    if(isset($_SESSION['error']))
        if($_SESSION['error']=="notRegistered"){
            ?> <script>console.log(3);document.getElementById("erroreEmailAccedi").innerText ="Questa email non è registrata";</script><?php }
        elseif($_SESSION['error']=="invalidPassword"){
                ?> <script>console.log(3);document.getElementById("errorePassword").innerText ="Password errata";</script><?php }
                elseif($_SESSION['error']=="alreadyRegistered"){
                    ?> <script>console.log(3);document.getElementById("erroreEmailRegistrati").innerText ="Questa email è già registrata";</script><?php }      
    ?>
</body>
</html>       


