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
        nomeModulo.username.focus();
    return false;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(nomeModulo.username.value)) {
        alert("L'indirizzo email non è valido");
        document.getElementById("username").focus();
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
    if (!/[A-Z]/.test(nomeModulo.pwd1.value)) {
        alert("La password deve contenere almeno una lettera maiuscola");
        document.getElementById("pwd1").focus();
        return false;
    }
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(nomeModulo.pwd1.value)) {
        alert("La password deve contenere almeno un carattere speciale");
        document.getElementById("pwd1").focus();
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
function mostraPassword(number) {
    var mostraPasswordCheckbox = document.getElementById("mostra"+number);
    var passwordInput = document.getElementById("pwd"+number);
    passwordInput.type = mostraPasswordCheckbox.checked ? "text" : "password";
}