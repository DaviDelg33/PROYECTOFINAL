document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("search-form");
    const searchInput = document.getElementById("search-input");
    const productsContainer = document.querySelector(".products-container");

    searchForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const searchText = searchInput.value.trim();

        fetch(`productos.php?search=${searchText}`)
                .then(response => response.text())
                .then(data => {
                    productsContainer.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error al obtener los productos:', error);
                });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const productos = document.querySelectorAll(".product");
    productos.forEach(producto => {
        producto.addEventListener("click", function() {
            const idProducto = this.getAttribute("data-id");
            window.location.href = "detallesProductos.php?id=" + idProducto;
        });
    });
});

