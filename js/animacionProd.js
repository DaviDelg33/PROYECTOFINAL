document.addEventListener("DOMContentLoaded", function() {
    var products = document.querySelectorAll('.product');

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