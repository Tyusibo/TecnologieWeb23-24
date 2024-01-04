function setCookie() {
    var usernameCookie = getCookie('nome_utente');
    
    if (usernameCookie && passwordCookie) {
        document.getElementById('usernameAccedi').value = decodeURIComponent(usernameCookie);
    }
}

function getCookie(name) {
    var match = document.cookie.match(new RegExp(name + '=([^;]+)'));
    return match ? decodeURIComponent(match[1]) : null;
}

setCookie();