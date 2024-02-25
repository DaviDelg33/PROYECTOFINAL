document.addEventListener("DOMContentLoaded", function() {
    var products = document.querySelectorAll('.product');
    // Itera sobre cada elemento en la colección 'products'.
    products.forEach(function(product) {
        var details = product.querySelector('.product-details');

        product.addEventListener('mouseover', function() {
            details.style.display = 'block';
        });

        product.addEventListener('mouseout', function() {
            details.style.display = 'none';
        });
    });
});