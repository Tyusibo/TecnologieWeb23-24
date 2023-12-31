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
            if (nomeModulo.cognome.value == "") {
                alert("Devi inserire un cognome");
                nomeModulo.cognome.focus();
            return false;
            }
            if (nomeModulo.numero.value == "") {
                alert("Devi inserire un numero");
                nomeModulo.numero.focus();
            return false;
            }
            if (nomeModulo.numero.value.length<8) {
                alert("Il numero deve contenere almeno 8 caratteri");
                nomeModulo.numero.focus();
            return false;
            }
            if (nomeModulo.pwd1.value == "") {
                alert("Devi inserire una password");
                nomeModulo.pwd1.focus();
            return false;
            }
            if (nomeModulo.pwd1.value.length<8) {
                alert("La password deve essere almeno lunga 8 caratteri");
                nomeModulo.pwd1.focus();
            return false;
            }
            if (nomeModulo.pwd1.value.length>20) {
                alert("La password non deve essere più lunga di 20 caratteri");
                nomeModulo.pwd1.focus();
            return false;
            }

            if (nomeModulo.pwd2.value == "") {
                alert("Devi inserire la password di conferma");
                nomeModulo.pwd1.focus();
            return false;
            }
            if (nomeModulo.pwd1.value != nomeModulo.pwd2.value) {
                alert("Le due password non corrispondono");
                nomeModulo.pwd2.focus();    
                nomeModulo.pwd2.select();
            return false;
            }
            return true
        }
        
    function soloNumeri(event){
            var tasto;
            tasto = event.key;
            var campo = event.target.value;
            if ((tasto=="Delete") || (tasto=="Enter") || (tasto=="Backspace") || (tasto=="Control") || ((tasto=="+") && (campo.indexOf("+") === -1))){
                return true;
            } else if (("0123456789").indexOf(tasto) > -1){
                if (campo.length < 12 ) {
                    return true;
            } else {
                alert("Il numero di telefono non può superare i 12 caratteri");
                return false;
            }
                }
                else {
                    alert("il campo accetta solo numeri e il carattere + come primo carattere");
                    return false;
                }
        }

</script>
        

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
                essere lunga minimo 8 caratteri e non più di 20:<input type="password" name="pwd1"value="<?php echo $password1?>"></label>
                <label>Inseriscila la password di conferma:<input type="password" name="pwd2" value="<?php echo $password2?>"></label>
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
    <script src="script/caricaFooter.js"></script>
</body>
</html>       
