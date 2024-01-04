// Crea un elemento script
var scriptTag = document.createElement("script");

// Imposta l'attributo src con il percorso della libreria
scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js";

// Aggiungi l'elemento script all'elemento head del documento
document.head.appendChild(scriptTag);
function cambiaModalità(mod){
    var accedi=document.getElementById("accedi");
    var registrati=document.getElementById("registrati");
    if(mod){
        accedi.style.display = "block";
        registrati.style.display = "none";
    } else {
        accedi.style.display = "none";
        registrati.style.display = "block";
    }
}
function validaModuloAccedi(nomeModulo) {
    console.log(3);
    var error=false;

    document.getElementById("erroreEmailAccedi").innerText ="";
    document.getElementById("errorePassword").innerText ="";

    if (nomeModulo.usernameAccedi.value == "") {
        document.getElementById("erroreEmailAccedi").innerText = "Devi inserire un'email";
        error=true;
    } else if (!(validator.isEmail(nomeModulo.usernameAccedi.value))) {
            document.getElementById("erroreEmailAccedi").innerText = "L'indirizzo email non è valido";
            error=true;
        }
    
    
    if (nomeModulo.pwd.value == "") {
        document.getElementById("errorePassword").innerText = "Devi inserire una password";
        nomeModulo.pwd.focus();
        error=true;
    } 
   
    return !error;
}

function mostraPassword(number) {
    var icona=document.getElementById("mostra"+number);
    var passwordInput = document.getElementById("pwd"+number);
    if(passwordInput.type =="text"){
        passwordInput.type="password";
        icona.classList.remove("fa-eye-slash");
        icona.classList.add("fa-eye"); 
    }
    else{
        passwordInput.type="text";
        icona.classList.remove("fa-eye"); 
        icona.classList.add("fa-eye-slash");
    }
    passwordInput.focus();
}


function validaModuloRegistrati(nomeModulo) {
    var error=false;
    var simulatedEvent = {
        target: {
            value: pwd1.value
        }
    };
    document.getElementById("erroreNome").innerText ="";
    document.getElementById("erroreCognome").innerText ="";
    document.getElementById("erroreEmailRegistrati").innerText ="";
    document.getElementById("erroreNumero").innerText ="";
    document.getElementById("errorePassword1").innerText ="";
    document.getElementById("errorePassword2").innerText ="";
    if (nomeModulo.nome.value == "") {
        document.getElementById("erroreNome").innerText ="Devi inserire un nome";
        error=true;
    }
    if (nomeModulo.cognome.value == "") {
        document.getElementById("erroreCognome").innerText = "Devi inserire un cognome";
        error=true;
    }
    if (nomeModulo.usernameRegistrati.value == "") {
        document.getElementById("erroreEmailRegistrati").innerText = "Devi inserire un'email";
        error=true;
    } else if (!(validator.isEmail(nomeModulo.usernameRegistrati.value))) {
            document.getElementById("erroreEmailRegistrati").innerText = "L'indirizzo email non è valido";
            error=true;
        }
    
    if (nomeModulo.numero.value == "") {
        document.getElementById("erroreNumero").innerText = "Devi inserire un numero" ;
        error=true;
    } else if (nomeModulo.numero.value.length<10) {
            document.getElementById("erroreNumero").innerText = "Il numero deve contenere almeno 10 caratteri";
            error=true;
        }
    
    if (nomeModulo.pwd1.value == "") {
        document.getElementById("errorePassword1").innerText = "Devi inserire una password";
        error=true;
    } else{
        // Chiamare verificaPassword con l'oggetto evento simulato
        error=verificaPassword(simulatedEvent);
        if(error)
            document.getElementById("errorePassword1").innerText = "Controlla il formato da rispettare per la password";
    }

    if (nomeModulo.pwd2.value == "") {
        document.getElementById("errorePassword2").innerText = "Devi inserire la password di conferma";
        error=true;
    } else if (nomeModulo.pwd1.value != nomeModulo.pwd2.value) {
            document.getElementById("errorePassword2").innerText = "Le due password non corrispondono";
            error=true;
        }
    
    return !error;
}

function verificaPassword(event){
    requisiti=document.getElementById("requisitiPassword");
    requisiti.style.display="block";
    var error=false;
    var minuscola=document.getElementById("minuscola");
    var maiuscola=document.getElementById("maiuscola");
    var numero=document.getElementById("numero");
    var speciale=document.getElementById("speciale");
    var lun_min=document.getElementById("lun_min");
    var lun_max=document.getElementById("lun_max");
    if (!/[a-z]/.test(event.target.value)){
        minuscola.classList.add("errore");
        error=true;
    } else 
        minuscola.classList.remove("errore");
    if (!/[A-Z]/.test(event.target.value)){
        maiuscola.classList.add("errore");
        error=true;
    } else 
        maiuscola.classList.remove("errore");
    if (!/[0-9]/.test(event.target.value)) {
        numero.classList.add("errore");
        error=true;
    } else 
        numero.classList.remove("errore");
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(event.target.value)){
        speciale.classList.add("errore");
        error=true;
    } else 
        speciale.classList.remove("errore");
    if (event.target.value.length<8){
        lun_min.classList.add("errore");
        error=true;
    } else 
        lun_min.classList.remove("errore");
    if (event.target.value.length>20){
        lun_max.classList.add("errore");
        error=true;
    } else 
        lun_max.classList.remove("errore"); 
    return error;
}

function nascondiRequisti(event){
    var requisiti=document.getElementById("requisitiPassword");
    requisiti.style.display="none";
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



