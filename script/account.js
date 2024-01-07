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

document.getElementById("dati").addEventListener("click", function() {
    sezioni(1);
});
document.getElementById("prenotazioni").addEventListener("click", function() {
    sezioni(2);
});
document.getElementById("preferenze").addEventListener("click", function() {
    sezioni(3);
});