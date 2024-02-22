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
    if (currentIndex < 2) {
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
        document.getElementById('map'), {zoom: 10, center: shopLocation, mapId: 'f6e6edb80243cb2e'});
 
    
    const userLocation = { lat: position.coords.latitude, lng: position.coords.longitude };
    var marker = new google.maps.marker.AdvancedMarkerElement({
        map,
        position: shopLocation
    });

    const manIcon = document.createElement("img");
    manIcon.src = "https://maps.gstatic.com/mapfiles/ms2/micons/man.png";
    var userMarker = new google.maps.marker.AdvancedMarkerElement({
        map,
        position: userLocation,
        content: manIcon
    });
}

 function initMapErr(positionErr){
    var shopLocation = {lat: 40.77248001098633, lng: 14.789327621459961};
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 10, center: shopLocation});
    var marker = new google.maps.Marker({position: shopLocation, map: map});
}