// Crea un elemento script
var scriptTag = document.createElement("script");

// Imposta l'attributo src con il percorso della libreria
scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js";

// Aggiungi l'elemento script all'elemento head del documento
document.head.appendChild(scriptTag);

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
    if (nomeModulo.username.value == "") {
        alert("Devi inserire un'email");
        setTimeout(function() {
            nomeModulo.username.focus();
        }, 0);
        return false;
    }
    if (nomeModulo.numero.value == "") {
        alert("Devi inserire un numero");
        nomeModulo.numero.focus();
    return false;

    }
    if (nomeModulo.pwd1.value == "") {
        alert("Devi inserire una password");
        nomeModulo.pwd1.focus();
    return false;
    }
    
    if (nomeModulo.pwd2.value == "") {
        alert("Devi inserire la password di conferma");
        nomeModulo.pwd2.focus();
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


function lunghezzaNumero(event){
    if (
        (event.relatedTarget && event.relatedTarget.closest("#footerContainer")) ||
        (document.activeElement && document.activeElement.closest("#footerContainer"))
    ) {
        return;
    }
    if (event.target.value.length<10) {
        alert("Il numero deve contenere almeno 10 caratteri");
        setTimeout(function() {
            event.target.focus();
        }, 0);
    return false;
}
}

function soloCaratteri(event){
    var tasto = event.key;
    var campo = event.target.value;
    if ((tasto=="Delete") || (tasto=="Enter") || (tasto=="Backspace") || (tasto=="Control"))
        return true;
    if ((/^[A-Z]+$/.test(tasto)) && (campo.length===0))
        return true;
    if (!(/^[a-z]+$/.test(tasto)))
        return false;
    if(campo.length===0){

            event.target.value = tasto.toUpperCase();

            event.preventDefault();
    }
}



function verificaEmail(event) {
    if (
        (event.relatedTarget && event.relatedTarget.closest("#footerContainer")) ||
        (document.activeElement && document.activeElement.closest("#footerContainer"))
    ) {
        return;
    }
    if (!validator.isEmail(event.target.value)) {
        alert("L'indirizzo email non è valido");
        setTimeout(function() {
            event.target.focus();
        }, 0);
        return false;
    }
}

function verificaPassword(event) {
    if (
        (event.relatedTarget && (event.relatedTarget.id === "mostra1" || event.relatedTarget.closest("#footerContainer"))) ||
        (document.activeElement && (document.activeElement.id === "mostra1" || document.activeElement.closest("#footerContainer")))
    ) {
        return;
    }
        if (event.target.value.length<8) {
            alert("La password deve essere almeno lunga 8 caratteri");
            setTimeout(function() {
                event.target.focus();
            }, 0);
            return false;
        }
        if (event.target.value.length>20) {
            alert("La password non deve essere più lunga di 20 caratteri");
            setTimeout(function() {
                event.target.focus();
            }, 0);
            return false;
        }
        if (!/[A-Z]/.test(event.target.value)) {
            alert("La password deve contenere almeno una lettera maiuscola");
            setTimeout(function() {
                event.target.focus();
            }, 0);
            return false;
        }
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(event.target.value)) {
            alert("La password deve contenere almeno un carattere speciale");
            setTimeout(function() {
                event.target.focus();
            }, 0);
            return false;
        }
}

function verificaPassword2(event) {
    if (
        (event.relatedTarget && event.relatedTarget.closest("#footerContainer")) ||
        (document.activeElement && document.activeElement.closest("#footerContainer"))
    ) {
        return;
    }
    if (nomeModulo.pwd1.value != nomeModulo.pwd2.value) {
        alert("Le due password non corrispondono");
        nomeModulo.pwd2.focus();    
        nomeModulo.pwd2.select();
    return false;
    }
}


function mostraPassword(number) {
    var mostraPasswordCheckbox = document.getElementById("mostra"+number);
    var passwordInput = document.getElementById("pwd"+number);
    passwordInput.type = mostraPasswordCheckbox.checked ? "text" : "password";
    passwordInput.focus();
}