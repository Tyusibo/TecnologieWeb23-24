document.getElementById("dati").addEventListener("click", function() {
    sezioni(1);
});
document.getElementById("prenotazioni").addEventListener("click", function() {
    sezioni(2);
});
document.getElementById("preferenze").addEventListener("click", function() {
    sezioni(3);
});

function sezioni(sezione){
    var dati=document.getElementById("sezioneDati");
    var prenotazioni=document.getElementById("sezionePrenotazioni");
    var preferenze=document.getElementById("sezionePreferenze");
    if(sezione==1){
        dati.style.display="block";
        prenotazioni.style.display="none";
        preferenze.style.display="none";
    } else if(sezione==2){
        dati.style.display="none";
        prenotazioni.style.display="block";
        preferenze.style.display="none";
        } else {
            dati.style.display="none";
            prenotazioni.style.display="none";
            preferenze.style.display="block";
        }
}

document.getElementById("esciAccount").addEventListener("click", function() {
    esci();
});  //sta in header.js

function cancellaPrenotazione(barbiere,id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var sezione=document.getElementById("sezionePrenotazioni");
            sezione.innerHTML=this.responseText;
            }
        };

    xmlhttp.open("POST", "database/account.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere + "&id=" + id); 
 }

 function cancellaPreferenza(preferenza,id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var sezione=document.getElementById("sezionePreferenze");
            sezione.innerHTML=this.responseText;
            }
        };

    xmlhttp.open("POST", "database/account.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("preferenza=" + preferenza + "&id=" + id); 
 }




