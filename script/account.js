// Crea un elemento script
var scriptTag = document.createElement("script");

// Imposta l'attributo src con il percorso della libreria
scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js";

// Aggiungi l'elemento script all'elemento head del documento
document.head.appendChild(scriptTag);

function validaModulo(nomeModulo) {
    var error=false;

    document.getElementById("erroreEmail").innerText ="";
    document.getElementById("errorePassword").innerText ="";

    if (nomeModulo.username.value == "") {
        document.getElementById("erroreEmail").innerText = "Devi inserire un'email";
        nomeModulo.username.focus();
        error=true;
    } else if (!(validator.isEmail(nomeModulo.username.value))) {
            document.getElementById("erroreEmail").innerText = "L'indirizzo email non è valido";
            nomeModulo.username.focus();
            error=true;
        }
    
    
    if (nomeModulo.pwd.value == "") {
        document.getElementById("errorePassword").innerText = "Devi inserire una password";
        nomeModulo.pwd.focus();
        error=true;
    } else if (nomeModulo.pwd.value.length<8) {
            document.getElementById("errorePassword").innerText = "La password deve essere almeno lunga 8 caratteri";
            nomeModulo.pwd.focus();
            error=true;
            } else if (nomeModulo.pwd.value.length>20) {
                document.getElementById("errorePassword").innerText = "La password non deve essere più lunga di 20 caratteri";
                nomeModulo.pwd.focus();
                error=true;
                } else if (!/[A-Z]/.test(nomeModulo.pwd.value)) {
                    document.getElementById("errorePassword").innerText = "La password deve contenere almeno una lettera maiuscola";
                    nomeModulo.pwd.focus();
                    error=true;
                    } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(nomeModulo.pwd.value)) {
                        document.getElementById("errorePassword").innerText = "La password deve contenere almeno un carattere speciale";
                        nomeModulo.pwd.focus();
                        error=true;
                    }
   
    return !error;
}

function mostraPassword() {
    var icona=document.getElementById("mostra");
    var passwordInput = document.getElementById("pwd");
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