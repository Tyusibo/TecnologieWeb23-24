function buzz() {
    all();
    var Imgs = document.querySelectorAll('.galimg.buzz');
    Imgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("buzzcat");
    active(button);
}

function french() {
    all();
    var Imgs = document.querySelectorAll('.galimg.french');
    Imgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("frenchcat");
    active(button);
}
function curtains(){
    all();
    var Imgs = document.querySelectorAll('.galimg.curtains');
    Imgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("curtainscat");
    active(button);
}
function side(){
    all();
    var Imgs = document.querySelectorAll('.galimg.side');
    Imgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("sidecat");
    active(button);
}
function mohawk(){
    all();
    var Imgs = document.querySelectorAll('.galimg.mohawk');
    Imgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("mohawkcat");
    active(button);
}

function dispAll(){
    all();
    var allImgs = document.querySelectorAll('.galimg');
    allImgs.forEach(function(img) {
        img.style.display = 'block';
    });
    var button = document.getElementById("all");
    active(button);
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

function active(button){
    button.classList.add("active");
}



