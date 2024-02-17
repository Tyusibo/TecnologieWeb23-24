function stile(event){
    var stileId = event.target.id;
    all();
    var Img = document.querySelectorAll('.galimg.'+stileId);
    Img.forEach(function(img) {
        img.style.display = 'block';
    });
    event.target.classList.add('active');
}


function dispAll(){
    all();
    var allImgs = document.querySelectorAll('.galimg');
    allImgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("all");
    button.classList.add('active');
}

function all(){
    var allImgs = document.querySelectorAll('.galimg');
    allImgs.forEach(function(img) {
        img.style.display = 'none';
    });

    var active = document.querySelectorAll('.category');
    active.forEach(function(button) {
        button.classList.remove("active");
    });

    window.scrollTo({ top: 0, behavior: 'smooth' });
}


function aggiungiPreferenza(id,preferenza){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText=="full")
                alert("tutte piene");
            else
                mostra(id);
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
        };
    }

    xmlhttp.open("POST", "database/galleria.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id + "&preferenza=" + preferenza + "&mode=" + "rimuovi"); 
}

function mostra(id){
    var elemento = document.getElementsByClassName('star');
    var stili = ["BUZZ CUT", "FRENCH CROP", "CURTAINS", "SIDE PART", "MOHAWK"];
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
    var stili = ["BUZZ CUT", "FRENCH CROP", "CURTAINS", "SIDE PART", "MOHAWK"];
    var classe=event.target.classList;
    var id=event.target.id;
    var splitted = id.split('_');
    if(classe[2]=="fa-star-o"){  
        aggiungiPreferenza(id_utente, stili[splitted[1]-1],event);        
    }
    else{
        rimuoviPreferenza(id_utente, stili[splitted[1]-1],event);
        event.target.classList.remove('fa-star');
        event.target.classList.add('fa-star-o');
    }
}

