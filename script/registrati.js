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
    if (nomeModulo.username.value == "") {
        document.getElementById("erroreEmailRegistrati").innerText = "Devi inserire un'email";
        error=true;
    } else if (!(validator.isEmail(nomeModulo.username.value))) {
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
    var error=false;
    var minuscola=document.getElementById("mancataMinuscola");
    var maiuscola=document.getElementById("mancataMaiuscola");
    var numero=document.getElementById("mancatoNumero");
    var speciale=document.getElementById("mancatoSpeciale");
    var lun_min=document.getElementById("lunMin");
    var lun_max=document.getElementById("lunMax");
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
document.getElementById("pwd1").addEventListener("input", function() {
    verificaPassword(event);
});

function selezionaPrefisso() {
    var selectElement = document.getElementById("prefisso");
    var selectedValue = selectElement.value;
    var numero = document.getElementById("numero");
    if(selectedValue!="Seleziona il prefisso"){
            numero.value=selectedValue;
            document.getElementById("erroreNumero").innerText ="";
    }
}


function soloNumeri(event){
    document.getElementById("erroreNumero").innerText ="";
    var tasto;
    tasto = event.key;
    var campo = event.target.value;
    if (campo.length==0) {
        document.getElementById("erroreNumero").innerText ="Scegli prima il prefisso";
        return false;
    }
    if ((tasto=="Delete") || (tasto=="Enter") || (tasto=="Backspace") || (tasto=="Control"))
        return true;
    if (("0123456789").indexOf(tasto) > -1){
        if (campo.length==14) {
            document.getElementById("erroreNumero").innerText ="Il numero da te inserito supera il limite consentito";
            return false;
    } else {
        return true;        
    }
    } else return false;
}

document.getElementById("numero").addEventListener("keydown", function() {
    return soloNumeri(event);
});

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
document.getElementById("nome").addEventListener("keydown", function() {
    return soloCaratteri(event);
});

document.getElementById("cognome").addEventListener("keydown", function() {
    return soloCaratteri(event);
});




