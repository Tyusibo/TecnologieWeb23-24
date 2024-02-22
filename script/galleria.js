function rimuoviAttivo(){
    var attivo = document.getElementsByClassName("active");
    attivo[0].classList.remove("active");
}

function removeAll(){
    var allImgs = document.querySelectorAll('.galimg');
    allImgs.forEach(function(img) {
        img.style.display = 'none';
    });

    rimuoviAttivo();
}

function stile(event){
    var stileId = event.target.id;
    removeAll();
    var Img = document.querySelectorAll('.galimg.'+stileId);
    Img.forEach(function(img) {
        img.style.display = 'block';
    });
    event.target.classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showAll(){
    rimuoviAttivo();
    var allImgs = document.querySelectorAll('.galimg');
    allImgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("all");
    button.classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

var stili = ["BUZZ CUT", "FRENCH CROP", "CURTAINS", "SIDE PART", "MOHAWK"];

function mostra(id){
    var elemento = document.getElementsByClassName('star');
    for (var i = 0; i < elemento.length; i++) {
        elemento[i].classList.add('fa-star-o');
    } 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var parti = this.responseText.split('\n');
            for(i=0;i<(parti.length-1);i++){
                var posizione=stili.indexOf(parti[i]);
                var stella=document.getElementById("star_"+(posizione+1));
                stella.classList.remove('fa-star-o');
                stella.classList.add('fa-star');
            }
        };
    }
    xmlhttp.open("POST", "database/galleria.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id); 
}

function gestisciPreferenza(id_utente,event){
    var classe=event.target.classList;
    var id=event.target.id;
    var splitted = id.split('_');
    if(classe[2]=="fa-star-o")
        aggiungiPreferenza(id_utente, stili[splitted[1]-1]);        
    else
        rimuoviPreferenza(id_utente, stili[splitted[1]-1]);
}

function aggiungiPreferenza(id,preferenza){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText=="full")
                apriPopup();
            else{
                var pos = stili.indexOf(preferenza);
                var stella = document.getElementById("star_" + (pos+1));
                stella.classList.remove('fa-star-o');
                stella.classList.add('fa-star');
                }
        };
    }

    xmlhttp.open("POST", "database/galleria.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id + "&preferenza=" + preferenza + "&mode=" + "aggiungi"); 
}

function rimuoviPreferenza(id,preferenza){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var pos = stili.indexOf(preferenza);
            var stella = document.getElementById("star_" + (pos+1));
            stella.classList.remove('fa-star');
            stella.classList.add('fa-star-o');
        };
    }

    xmlhttp.open("POST", "database/galleria.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id + "&preferenza=" + preferenza + "&mode=" + "rimuovi"); 
}


document.addEventListener("scroll", function() {
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;
    var fixedElement = document.querySelector('.galint');
    var div = document.getElementById('galleria');
    var stopPoint = (div.offsetHeight - 500);
    

    if (scrollPosition >= stopPoint) {
        fixedElement.style.position = 'absolute';
        fixedElement.style.top = (stopPoint + 265) + 'px'; // Fissa l'elemento al punto di stop
    } else {
        fixedElement.style.position = 'fixed';
        fixedElement.style.top = '265px'; // Distanza originale dall'alto quando segue lo scroll
    }
});


function apriPopup() {
    var popup = document.getElementById("popup-prenota");
    popup.style.display = "flex"; // Mostra il popup
}

function chiudiPopup(){
    var popup = document.getElementById("popup-prenota");
    popup.style.display = "none"; // Mostra il popup
}