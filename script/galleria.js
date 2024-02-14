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


function preferenze(){
    var elemnto = document.getElementsByClassName('active');
    
}
