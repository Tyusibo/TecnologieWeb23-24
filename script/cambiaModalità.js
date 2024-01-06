document.addEventListener("DOMContentLoaded", function() { 
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
    cambiaModalità(false);
});