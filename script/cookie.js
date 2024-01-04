function setCookie() {
    var usernameCookie = getCookie('nome_utente');
    var passwordCookie = getCookie('password');
    
    if (usernameCookie && passwordCookie) {
        document.getElementById('username').value = decodeURIComponent(usernameCookie);
        document.getElementById('pwd').value = decodeURIComponent(passwordCookie);
    }
}

function getCookie(name) {
    var match = document.cookie.match(new RegExp(name + '=([^;]+)'));
    return match ? decodeURIComponent(match[1]) : null;
}

setCookie();