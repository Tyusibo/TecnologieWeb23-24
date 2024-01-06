function validaModuloAccedi(nomeModulo) {
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
        error=true;
    } 
   
    return !error;
}

function setCookie() {
    var usernameCookie = getCookie('nome_utente');
    
    if (usernameCookie) {
        document.getElementById('usernameAccedi').value = decodeURIComponent(usernameCookie);
    }
}

function getCookie(name) {
    var match = document.cookie.match(new RegExp(name + '=([^;]+)'));
    return match ? decodeURIComponent(match[1]) : null;
}

setCookie();