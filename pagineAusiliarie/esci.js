document.getElementById("esci").addEventListener("click", function() {
    esci();
});
document.getElementById("esciAccount").addEventListener("click", function() {
    esci();
});


function esci() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log("ReadyState: " + this.readyState + ", Status: " + this.status);
    
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "homepage.php";
        }
    };

    // Apre la connessione e invia una richiesta POST al server
    xmlhttp.open("POST", "pagineAusiliarie/esci.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("");
}