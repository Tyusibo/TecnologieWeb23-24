function redirect(mode) {
    var currentPageName = window.location.pathname.split('/').pop();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {    
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "autenticazione.php";
        }
    };
    // Apre la connessione e invia una richiesta POST al server
    xmlhttp.open("POST", "pagineAusiliarie/redirect.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("mod=" + mode + "&currentPageName=" + currentPageName);
}

// Aggiungi un evento di click a un elemento HTML (sostituisci "id_del_tuo_elemento" con l'id reale)
document.getElementById("accedi").addEventListener("click", function() {
    redirect(false);
});
document.getElementById("registrati").addEventListener("click", function() {
    redirect(true);
});