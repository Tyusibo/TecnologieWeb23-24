// Crea un elemento script
var scriptTag = document.createElement("script");

// Imposta l'attributo src con il percorso della libreria
scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js";

// Aggiungi l'elemento script all'elemento head del documento
document.head.appendChild(scriptTag);

function validaModulo(nomeModulo) {
    var error=false;
    document.getElementById("erroreNome").innerText ="";
    document.getElementById("erroreCognome").innerText ="";
    document.getElementById("erroreEmail").innerText ="";
    document.getElementById("erroreNumero").innerText ="";
    document.getElementById("errorePassword1").innerText ="";
    document.getElementById("errorePassword2").innerText ="";
    if (nomeModulo.nome.value == "") {
        document.getElementById("erroreNome").innerText ="Devi inserire un nome";
        nomeModulo.nome.focus();
        error=true;
    }
    if (nomeModulo.cognome.value == "") {
        document.getElementById("erroreCognome").innerText = "Devi inserire un cognome";
        nomeModulo.cognome.focus();
        error=true;
    }
    if (nomeModulo.username.value == "") {
        document.getElementById("erroreEmail").innerText = "Devi inserire un'email";
        nomeModulo.username.focus();
        error=true;
    } else if (!(validator.isEmail(nomeModulo.username.value))) {
            document.getElementById("erroreEmail").innerText = "L'indirizzo email non è valido";
            nomeModulo.username.focus();
            error=true;
        }
    
    if (nomeModulo.numero.value == "") {
        document.getElementById("erroreNumero").innerText = "Devi inserire un numero" ;
        nomeModulo.numero.focus();
        error=true;
    } else if (nomeModulo.numero.value.length<10) {
            document.getElementById("erroreNumero").innerText = "Il numero deve contenere almeno 10 caratteri";
            nomeModulo.numero.focus();
            error=true;
        }
    
    if (nomeModulo.pwd1.value == "") {
        document.getElementById("errorePassword1").innerText = "Devi inserire una password";
        nomeModulo.pwd1.focus();
        error=true;
    } else if (nomeModulo.pwd1.value.length<8) {
            document.getElementById("errorePassword1").innerText = "La password deve essere almeno lunga 8 caratteri";
            nomeModulo.pwd1.focus();
            error=true;
            } else if (nomeModulo.pwd1.value.length>20) {
                document.getElementById("errorePassword1").innerText = "La password non deve essere più lunga di 20 caratteri";
                nomeModulo.pwd1.focus();
                error=true;
                } else if (!/[A-Z]/.test(nomeModulo.pwd1.value)) {
                    document.getElementById("errorePassword1").innerText = "La password deve contenere almeno una lettera maiuscola";
                    nomeModulo.pwd1.focus();
                    error=true;
                    } else if (!/[a-z]/.test(nomeModulo.pwd1.value)) {
                        document.getElementById("errorePassword1").innerText = "La password deve contenere almeno una lettera minuscola";
                        nomeModulo.pwd1.focus();
                        error=true;
                        } else if (!/[0-9]/.test(nomeModulo.pwd1.value)) {
                            document.getElementById("errorePassword1").innerText = "La password deve contenere almeno un numero";
                            nomeModulo.pwd1.focus();
                            error=true;
                            } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(nomeModulo.pwd1.value)) {
                                document.getElementById("errorePassword1").innerText = "La password deve contenere almeno un carattere speciale";
                                nomeModulo.pwd1.focus();
                                error=true;
                            }
    if (nomeModulo.pwd2.value == "") {
        document.getElementById("errorePassword2").innerText = "Devi inserire la password di conferma";
        nomeModulo.pwd2.focus();
        error=true;
    } else if (nomeModulo.pwd1.value != nomeModulo.pwd2.value) {
            document.getElementById("errorePassword2").innerText = "Le due password non corrispondono";
            nomeModulo.pwd2.focus();    
            nomeModulo.pwd2.select();
            error=true;
        }
    
    return !error;
}

function soloNumeri(event){
    var tasto;
    tasto = event.key;
    var campo = event.target.value;
    if ((tasto=="Delete") || (tasto=="Enter") || (tasto=="Backspace") || (tasto=="Control") || ((tasto=="+") && (campo.indexOf("+") === -1)))
        return true;
    if (("0123456789").indexOf(tasto) > -1){
        if (campo.length < 13) {
            return true;
    } else {
        alert("Il numero di telefono non può superare i 13 caratteri");
        return false;
    }
        }
        else {
            alert("il campo accetta solo numeri e il carattere + come primo carattere");
            return false;
        }
    if(campo.length===0){

        event.target.value = tasto.toUpperCase();

        event.preventDefault();aaaa
    }
}



function soloCaratteri(event){
    var tasto = event.key;
    var campo = event.target.value;
    if ((tasto=="Delete") || (tasto=="Enter") || (tasto=="Backspace") || (tasto=="Control")|| (tasto==" "))
        return true;
    if ((/^[a-zA-Z]+$/.test(tasto)) && tasto.length==1){
        if(campo.length==0 || campo[campo.length-1]===" "){
            event.target.value += tasto.toUpperCase();
            event.preventDefault();
    } else {
        if (typeof event.target.value === 'string') {
            console.log(tasto + tasto);
            // Rendi il carattere minuscolo e aggiungilo al valore esistente
            event.target.value += tasto.toLowerCase();
            event.preventDefault();
        }
    }
    return true;
    }
       
    return false;
}

function mostraPassword(number) {
    var icona=document.getElementById("mostra"+number);
    var passwordInput = document.getElementById("pwd"+number);
    if(passwordInput.type =="text"){
        passwordInput.type="password";
        icona.classList.remove("fa-mask-face");
        icona.classList.add("fa-mustache"); 
    }
    else{
        passwordInput.type="text";
        icona.classList.remove("fa-mustache"); 
        icona.classList.add("fa-mask-face");
    }
    passwordInput.focus();
}