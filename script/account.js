function validaModulo(nomeModulo) {
    if (nomeModulo.username.value == "") {
        alert("Devi inserire un'email");
        nomeModulo.username.focus();
    return false;
    }
    if (nomeModulo.pwd.value == "") {
        alert("Devi inserire una password");
        nomeModulo.pwd.focus();
    return false;
    }

    return true
}

function mostraPassword() {
    var mostraPasswordCheckbox = document.getElementById("mostra");
    var passwordInput = document.getElementById("pwd");
    passwordInput.type = mostraPasswordCheckbox.checked ? "text" : "password";
}