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
