document.addEventListener("DOMContentLoaded", function() {
    var images = [
        "../img/tiendas/tienda.jpg",
        "../img/tiendas/tienda2.jpg",
        "../img/tiendas/tienda3.jpg"
    ];

    var currentIndex = 0;
    var carousel = document.querySelector(".Imagen .carrusel");


    function showNextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage();
    }

    function showPrevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage();
    }

    function updateImage() { 
        carousel.querySelector("img").src = images[currentIndex];
    }

    carousel.querySelector(".ant").addEventListener("click", showPrevImage);
    carousel.querySelector(".sig").addEventListener("click", showNextImage);
});