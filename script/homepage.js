const imageContainer = document.querySelector('.galleria_in');
const prevButton = document.querySelector('.dietro');
const nextButton = document.querySelector('.avanti');
let currentIndex = 0;

prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        updateGallery();
    }
});

nextButton.addEventListener('click', () => {
    if (currentIndex < 3) {
        currentIndex++;
        updateGallery();
    }
});

function updateGallery() {
    const offset = -currentIndex * 33;
    imageContainer.style.transform = `translateX(${offset}%)`;
}

function geoloc(){
    navigator.geolocation.getCurrentPosition(initMap, initMapErr);
}
 
function initMap(position) {
    var shopLocation = {lat: 40.77248001098633, lng: 14.789327621459961};
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 10, center: shopLocation});
 
    
    const userLocation = { lat: position.coords.latitude, lng: position.coords.longitude };
    var marker = new google.maps.Marker({position: shopLocation, map: map});
    var userMarker = new google.maps.Marker({position: userLocation, map: map});
}

 function initMapErr(positionErr){
    var shopLocation = {lat: 40.77248001098633, lng: 14.789327621459961};
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 10, center: shopLocation});
    var marker = new google.maps.Marker({position: shopLocation, map: map});
}