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
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datePicker").style.display = "block";
            orari();
            }
        };

    xmlhttp.open("POST", "ajax/data.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("barber=" + nome);
}

document.getElementById("data").addEventListener("change", function() {
    orari();
});

function orari() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    data=document.getElementById("date").value;
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("orari").style.display="block";
        document.getElementById("orari").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("POST", "database/orari.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + data);
}
 function prenota(event){
    data=document.getElementById("date").value;
    var orario = event.target.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {        
        if (this.readyState == 4 && this.status == 200) {
            orari();
            alert("Prenotato");
            }
        };

    xmlhttp.open("POST", "database/orari.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("data=" + data + "&orario=" + orario); 
 }


 