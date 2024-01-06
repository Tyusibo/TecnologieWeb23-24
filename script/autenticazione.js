// Crea un elemento script
var scriptTag = document.createElement("script");

// Imposta l'attributo src con il percorso della libreria
scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js";

// Aggiungi l'elemento script all'elemento head del documento
document.head.appendChild(scriptTag);
function cambiaModalità(mod){
    console.log("miao");
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





