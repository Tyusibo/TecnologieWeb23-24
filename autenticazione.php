<!DOCTYPE html>
<?php
session_start();
if (isset($_POST['reg'])) {// Recupera i valori dai campi di input del form registrati
    $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
    $nome=$_POST['nome']; 
    $cognome=$_POST['cognome']; 
    $username=$_POST['username']; 
    $numero=$_POST['numero']; 
    $pwd=$_POST['pwd1']; 
    $pwd1=$_POST['pwd2'];

    //check se l'username(email) già esiste
    if(username_exist($username)){
        echo "username(email) già esistente. <br/>";
    }else{
        if(insert_utente($nome, $cognome, $numero, $username, $pwd)){
            echo "utente inserito OK! ";
            if($_SESSION['redirect']!=null){   //solo se dopo la post redirect è null devo fare il reindirizzamento di default
                header("Location: $_SESSION[redirect]");
            } else 
                header("Location: account.php");
        }else
            echo "utente non inserito FAIL! ";
    }
} 

if (isset($_POST['acc'])) {// Recupera i valori dai campi di input del form accedi
    $_SESSION['username']  = $_POST['username'];  //per rendere effettiva l'autenticazione anche nelle altre pagine
    $username= $_POST['username']; 
    $pwd= $_POST['pwd']; 

    $stored_hash_pwd = get_pwd($username);
    if(!$stored_hash_pwd){
        echo "L'utente $username non esiste<br/>";
    }else{
        if(password_verify($pwd, $stored_hash_pwd)){

            if (isset($_POST['ricordami']) && $_POST['ricordami'] == 'on') {  //se ricordami è spuntato
                setcookie('nome_utente', $_POST['username'], time() + (30 * 24 * 60 * 60)); // Cookie valido per 30 giorni
            }
            if($_SESSION['redirect']!=null){   //solo se dopo la post redirect è null devo fare il reindirizzamento di default
                header("Location: $_SESSION[redirect]");
            } else 
                header("Location: account.php");

        }else{
            echo "Login Fail! password diverse<br/>";
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
                            <input class="textinput" type="password" size="20" id="pwd" name="pwd" value="">
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
    require "footer.php"; ?>
</body>
</html>       

<?php
    function get_pwd($username){ // se metto $user si prende quello di db_conncection
   		require "db_connection.php";
   		//CONNESSIONE AL DB
		$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
		$sql = "SELECT password_hash FROM utenti WHERE username=$1;";
		$prep = pg_prepare($db, "sqlPassword", $sql); 
		$ret = pg_execute($db, "sqlPassword", array($username));
		if(!$ret) {
			echo "ERRORE QUERY: " . pg_last_error($db);
			return false; 
		}
		else{
			if ($row = pg_fetch_assoc($ret)){ 
				$stored_hash = $row['password_hash'];
				return $stored_hash;
			}
			else{
				return false;
			}
   		}
   	}
    function username_exist($username){
        require "db_connection.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $sql = "SELECT username FROM public.utenti WHERE username=$1;";
        $prep = pg_prepare($db, "sqlUsername", $sql);
        $ret = pg_execute($db, "sqlUsername", array($username));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            return false; 
        }
        else{
            if ($row = pg_fetch_assoc($ret)){ 
                return true;
            }
            else{
                return false;
            }
        }

    }
    function insert_utente($nome, $cognome, $numero, $username, $pwd){
        require "db_connection.php";
        $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO public.utenti(nome, cognome, numero, username, password_hash)
                        VALUES($1, $2, $3, $4, $5); ";
        $prep = pg_prepare($db, "insertUser", $sql);
        $ret = pg_execute($db, "insertUser", array($nome, $cognome, $numero, $username, $hashed_pwd));
        if(!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            return false; 
        }
        else{
            return true;
        }
    }
?>
