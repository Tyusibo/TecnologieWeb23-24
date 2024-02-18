var inizializzazione=document.getElementById("andrea");  //per avere di default il primo barbiere selezionato
inizializzazione.click();

function attivo() {
    var barbiere=document.getElementsByClassName("active");
    if(barbiere.length==1)  //sarà sempre 1 o nessuno 
        return barbiere[0];  //ritorno l'elemento attivo
    return false;
 }

function mostraData(nome,id_utente) {  //per visualizzare la data e gli orari quando si seleziona un barbiere 
    var elementoAttivo=attivo();
    if(elementoAttivo!=false)
        elementoAttivo.classList.remove("active"); 

    var nuovoAttivo=document.getElementById(nome);  nuovoAttivo.classList.add("active");

    orari(id_utente);   //per aggiornare gli orari disponibili in base al barbiere e alla data
}

function orari(id_utente){
    var barbiere=attivo();  
    var data=document.getElementById("date").value;  //per avere la data selezionata
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("orari").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "database/prenota.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere.id + "&data=" + data + "&id_utente=" + id_utente);
}
 function prenota(event,id_utente){
    var barbiere=attivo();
    var data=document.getElementById("date").value;
    var orario = event.target.value;  //per avere l'orario del bottone selezionato
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            orari(id_utente);  //per aggiornare gli orari
            apriPopupPrenota();
            }
        };

    xmlhttp.open("POST", "database/prenota.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere.id + "&data=" + data + "&orario=" + orario + "&id_utente=" + id_utente); 
 }

function precedente() {
    var input = document.getElementById("date");
    var date = new Date(input.value);
    date.setDate(date.getDate() - 1);
    input.valueAsDate = date;

    //Disattivo freccia sinistra se non posso andare dietro ulteriormente
    var dataAttuale = new Date();
    if((date.getDate() == dataAttuale.getDate())  && (date.getMonth() == dataAttuale.getMonth()) && (date.getFullYear() == dataAttuale.getFullYear()) ){
        var sinistra = document.getElementById('sinistra');
        sinistra.style.display = 'none'; 
    }
    orari();
}



function prossimo() {
    var input = document.getElementById("date");
    var date = new Date(input.value);
    date.setDate(date.getDate() + 1);
    input.valueAsDate = date;
    orari();

    var sinistra = document.getElementById('sinistra');
    sinistra.style.display = 'block';
}

function apriPopup() {
    var popup = document.getElementById("popup-prenota");
    popup.style.display = "flex"; // Mostra il popup
}

function chiudiPopup(){
    var popup = document.getElementById("popup-prenota");
    popup.style.display = "none"; // Mostra il popup
}

function chiudiPopupPrenota(){
    var popup = document.getElementById("popup-prenotazione");
    popup.style.display = "none"; // Mostra il popup
}

function apriPopupPrenota(){
    var popup = document.getElementById("popup-prenotazione");
    popup.style.display = "flex"; // Mostra il popup
}

function redirectAccount(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "account.php";
            }
        };

    xmlhttp.open("POST", "pagineAusiliarie/redirectPrenota.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("");   
}
