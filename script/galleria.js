function stile(event){
    var stileId = event.target.id;
    all();
    var Img = document.querySelectorAll('.galimg.'+stileId);
    Img.forEach(function(img) {
        img.style.display = 'block';
    });
    event.target.classList.add('active');
    var addPref = document.getElementById('aggiungi');

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            var prova = this.responseText;
            console.log(prova);
            if(prova[2]=="f"){
                addPref.textContent="non scelto";
            } else {
                addPref.textContent="scelto";
            }
            addPref.style.display="block";
            }
        };

    xmlhttp.open("POST", "database/galleria.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("preferenza=" + event.target.textContent); 

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
    var addPref = document.getElementById('aggiungi');
    addPref.style.display="none";
}


function preferenze(){
    var elemnto = document.getElementsByClassName('active');
    
}
