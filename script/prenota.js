var barbiereIniziale=document.getElementById("andrea");  //per avere di default il primo barbiere selezionato
barbiereIniziale.click();

var dataGlobale=document.getElementById("date");  //prendo la data di oggi

var dataAttuale = new Date(dataGlobale.value);  //creo l'oggetto e controllo che non sia un giorno di chiusura
if(dataAttuale.getDay()==0) //se è lunedì vado a martedì
    dataAttuale.setDate(dataAttuale.getDate() + 2);
else if(dataAttuale.getDay()==1)  //se è domenica vado a martedì
    dataAttuale.setDate(dataAttuale.getDate() + 1);

dataGlobale.valueAsDate = new Date(Date.UTC(dataAttuale.getFullYear(), dataAttuale.getMonth(), dataAttuale.getDate()));  //aggiorno l'elemento

function attivo() {
    var barbiere=document.getElementsByClassName("active");
    if(barbiere.length==1)  //sarà sempre 1 o nessuno 
        return barbiere[0];  //ritorno l'elemento attivo
    return false;
 }

function cambiaBarbiere(nome,id_utente) {  //per visualizzare la data e gli orari quando si seleziona un barbiere 
    var elementoAttivo=attivo();
    if(elementoAttivo!=false)
        elementoAttivo.classList.remove("active"); 

    var nuovoAttivo=document.getElementById(nome);  
    nuovoAttivo.classList.add("active");

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
    event.target.disabled=true;  //per bloccare eventuali doppi clock
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

function precedente(id_utente) {
    var input = document.getElementById("date");
    var date = new Date(input.value);
    if(date.getDay()==2)  //se è martedì torno a sabato
        date.setDate(date.getDate() - 3);
    else
        date.setDate(date.getDate() - 1);
    input.valueAsDate = new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()));

    //Disattivo freccia sinistra se raggiungo la data attuale, che è stata stabilita all'inizio dello script
    if((date.getDate() == dataAttuale.getDate())  && (date.getMonth() == dataAttuale.getMonth()) && (date.getFullYear() == dataAttuale.getFullYear()) ){
        var sinistra = document.getElementById('sinistra');
        sinistra.style.visibility = 'hidden'; 
    }
    orari(id_utente);
}



function prossimo(id_utente) {
    var input = document.getElementById("date");
    var date = new Date(input.value);
    if(date.getDay()==6)  //se è sabato vado a martedì
        date.setDate(date.getDate() + 3);
    else
        date.setDate(date.getDate() + 1);
    input.valueAsDate = new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()));
    orari(id_utente);

    
    var sinistra = document.getElementById('sinistra');
    sinistra.style.visibility = 'visible';
}

function apriPopup() {
    var popup = document.getElementById("popup-prenota");
    popup.style.display = "flex"; // Mostra il popup
}

function chiudiPopup(){
    var popup = document.getElementById("popup-prenota");
    popup.style.display = "none"; // Mostra il popup
}

function apriPopupPrenota(){
    var popup = document.getElementById("popup-prenotazione");
    popup.style.display = "flex"; // Mostra il popup
}

function chiudiPopupPrenota(){
    var popup = document.getElementById("popup-prenotazione");
    popup.style.display = "none"; // Mostra il popup
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
