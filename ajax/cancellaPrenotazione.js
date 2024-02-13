function cancellaPrenotazione(barbiere,id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "account.php";
            sezioni(2);
            }
        };

    xmlhttp.open("POST", "database/cancella.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere + "&id=" + id); 
 }

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