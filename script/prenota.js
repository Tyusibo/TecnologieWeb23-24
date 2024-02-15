document.getElementById("andrea").addEventListener("click", function() {
    mostraData("andrea");
});
document.getElementById("rocco").addEventListener("click", function() {
    mostraData("rocco");
});
document.getElementById("francesco").addEventListener("click", function() {
    mostraData("francesco");
});

function mostraData(nome) {
    var andrea=document.getElementById("andrea"); andrea.classList.remove("active");   
    var rocco=document.getElementById("rocco"); rocco.classList.remove("active");
    var francesco=document.getElementById("francesco");  francesco.classList.remove("active");
    var elemento=document.getElementById(nome);  elemento.classList.add("active");
    document.getElementById("datePicker").style.display = "block";
    orari();
}

document.getElementById("data").addEventListener("change", function() {
    orari();
});

function orari() {
    var barbiere=attivo();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    data=document.getElementById("date").value;
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("orari").style.display="block";
        document.getElementById("orari").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("POST", "database/prenota.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere + "&data=" + data);
}
 function prenota(event){
    var barbiere=attivo();
    data=document.getElementById("date").value;
    var orario = event.target.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            orari();
            alert("Prenotato");
            }
        };

    xmlhttp.open("POST", "database/prenota.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barbiere=" + barbiere + "&data=" + data + "&orario=" + orario); 
 }


 function attivo() {
    var nome = ["andrea", "rocco", "francesco"];
    var i = 0;
    while (i < 3) {
        var barbiere = nome[i];
        var elemento = document.getElementById(barbiere);
        if (elemento.classList.contains("active")) {
            return barbiere;
        }
        i++;
    }
    // Se nessun elemento ha la classe "active"
    return null;
}


 