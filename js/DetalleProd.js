document.addEventListener("DOMContentLoaded", function () {
    var btnAgregarCarrito = document.getElementById('btnAgregarCarrito');
    if (btnAgregarCarrito) {
        btnAgregarCarrito.addEventListener('click', function () {
            var formData = new FormData(document.getElementById('formCarrito'));
            formData.append('accion', 'agregar'); // Indica la acción de agregar al carrito

            fetch('carrito.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Espera una respuesta JSON
            .then(data => {
                if(data.success) {
                    alert(data.message); // Muestra un mensaje de éxito
                    // Opcional: Actualiza el UI o redirige
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
document.addEventListener("DOMContentLoaded", function () {
    var products = document.querySelectorAll('.product');

    products.forEach(function (product) {
        var productName = product.querySelector('h2');
        var productPrice = product.querySelector('p');

        product.addEventListener('mouseenter', function () {
            productName.style.display = 'block';
            productPrice.style.display = 'block';
        });

        product.addEventListener('mouseleave', function () {
            productName.style.display = 'none';
            productPrice.style.display = 'none';
        });
    });
});