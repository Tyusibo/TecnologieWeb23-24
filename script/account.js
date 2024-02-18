document.getElementById("dati").addEventListener("click", function() {
    sezioni("dati",1);
});
document.getElementById("prenotazioni").addEventListener("click", function() {
    sezioni("prenotazioni",2);
});
document.getElementById("preferenze").addEventListener("click", function() {
    sezioni("preferenze",3);
});


function sezioni(categoria,sezione){  //questa funzione serve per mostrare la sezione desiderata e oscurare le altre
    var elementoAttivo=document.getElementsByClassName("active");
    elementoAttivo[0].classList.remove("active"); 
    var nuovoElementoAttivo=document.getElementById(categoria);
    nuovoElementoAttivo.classList.add("active");      


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
        } else if(sezione==3){
            dati.style.display="none";
            prenotazioni.style.display="none";
            preferenze.style.display="block";
        }
}

document.getElementById("esciAccount").addEventListener("click", function() {
    esci();
});  //la funzione è scritta in header.js poichè il comportamento è analogo ad esci dell'header (quello presente onmouse dell'omino)

function cancellaPrenotazione(barbiere,id_prenotazione,id_utente){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var sezione=document.getElementById("sezionePrenotazioni");
            sezione.innerHTML=this.responseText;  //per aggiornare la sezione
            }
        };

    xmlhttp.open("POST", "database/account.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere + "&id_prenotazione=" + id_prenotazione + "&id_utente=" + id_utente); 
 }

 function cancellaPreferenza(preferenza,id_utente){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var sezione=document.getElementById("sezionePreferenze");
            sezione.innerHTML=this.responseText;  //per aggiornare la sezione
            }
        };

    xmlhttp.open("POST", "database/account.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("preferenza=" + preferenza + "&id_utente=" + id_utente); 
 }




