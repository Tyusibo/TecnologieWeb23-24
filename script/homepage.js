function initMap() {
    // The location of Uluru
    var uluru = {lat: 40.77248001098633, lng: 14.789327621459961};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 10, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
    }

initMap();

let cont = 3;
let currentOffset = 0;
const imageContainer = document.getElementById('imageContainer');
const imageSlider = document.getElementById('imageSlider');
const images = document.querySelectorAll('.test img');
const imageWidth = 432 + 10; // Larghezza dell'immagine più il margine

function showSlide() {
    var imag=document.getElementById("imag"+cont);
    imag.classList.remove("acti");
    var imag2 = document.getElementById("imag"+( cont-3 ) );
    imag2.classList.add("acti"); 
    imageSlider.style.transform = `translateX(-${currentOffset}px)`;
}

function prevSlide() {
    if (currentOffset > 0) {
        currentOffset -= imageWidth;
        cont -= 1;
        showSlide();
    } else{
        currentOffset = 3 * imageWidth;
    }
}

function nextSlide() {
    if (currentOffset < (imageWidth * (images.length - 1))) {
        currentOffset += imageWidth;
        cont =+1;
        showSlide();
    } else{
        currentOffset = 0;
    }
}