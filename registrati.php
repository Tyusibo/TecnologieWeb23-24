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
    <title>Gentlemen's Cut Registrati</title>
    <link rel="stylesheet" type="text/css" href="css/registrati.css">
<body>
<script src="script/caricaHeader.js"></script>
<script>
    /*
    function attiva(){
          document.info.stato.focus();
    }
    function cambia(ogg){
        ogg.style.backgroundColor="yellow";
    }
    */
    function validaModulo(nomeModulo) {
            if (nomeModulo.nome.value == "") {
                alert("Devi inserire un nome");
                nomeModulo.nome.focus();
            return false;
            }
            if (nomeModulo.pwd1.value == "") {
                alert("Devi inserire una password");
                nomeModulo.pwd1.focus();
            return false;
            }
            if (nomeModulo.pwd1.value != nomeModulo.pwd2.value) {
                alert("Le due password non corrispondono");
                nomeModulo.pwd1.focus();
                nomeModulo.pwd1.select();
            return false;
            }
            return true
        }
        
    function soloNumeri(event){
            var tasto;
            tasto = event.key;
            if ((tasto=="Delete") || (tasto=="Enter") || (tasto=="Backspace")){
                return true;
            } else if ((("0123456789").indexOf(tasto) > -1)) {
                return true;
            }
            else {
                alert("il campo accetta solo numeri");
                return false;
            }
        }

</script>
        
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
</div>
<div id=registrati>Registrati
            <form method="POST" action="prenota.php">
                <label>Inserisci il tuo nome:<input type="text" size="30" name="nome"></label>
                <label>Inserisci il tuo cognome:<input type="text" size="30" name="cognome"></label>
                </br>
                <label>Inserisci l'email: 
                <input type="text" name="email">
                <label>Inserisci il numero: 
                <input type="text" name="numero" size="10" maxlength="10" onkeydown="return soloNumeri(event)" title="Il codice contiene solo numeri">
                </label>
                </br>
                <label>Scegli una password:<input type="password" name="pwd1"></label>
                <label>Inseriscila nuovamente:<input type="password" name="pwd2"></label>
                </br>
                <input type="submit" value="Invia">
                <input type="reset" value="Annulla">
            </form>
</div> 
<script src="script/caricaFooter.js"></script>
</body>
</html>       
