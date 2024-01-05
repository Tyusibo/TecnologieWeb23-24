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