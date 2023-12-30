<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Registrati</title>
    <link rel="stylesheet" type="text/css" href="CSS/registrati.css">
</head>
<body>
    <iframe src="header.html" width="100%" height="200px" frameborder="0"></iframe>
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

        <form onSubmit="return validaModulo(this);" ACTION='<?php echo $_SERVER['PHP_SELF'] ?>' name="inspwd">
            <label>Inserisci il tuo nome:
            <input type="text" size="30" name="nome">
            <label>Inserisci il tuo cognome:
            <input type="text" size="30" name="cognome">
            </label>
            <label>Inserisci il numero: 
            <input type="text" name="codice" size="5" maxlength="5" onkeydown="return soloNumeri(event)" title="Il codice contiene solo numeri">
            </label>
            <label>Scegli una password:
            <input type="password" name="pwd1"></label>
            <label>Inseriscila nuovamente:
            <input type="password" name="pwd2"></label>
            <input type="submit" value="Invia">
            <input type="reset" value="Annulla">
        </form>
        
        <iframe src="footer.html" width="100%" height="200px" frameborder="0" id="foot"></iframe> 
        
</body>
</html>