document.addEventListener('DOMContentLoaded', function () {
    var carrito = new Map(); // Almacenar ID del producto y su precio * cantidad
    var filas = document.querySelectorAll('table tr');

    for (var i = 1; i < filas.length; i++) {
        var idProducto = filas[i].querySelectorAll('td')[1].innerText; // Asumiendo que el ID es la segunda columna
        var precio = parseFloat(filas[i].querySelectorAll('td')[4].innerText.replace('€', ''));
        var cantidad = 1; // Aquí deberías extraer la cantidad real si es variable

        // Si el producto ya está en el carrito, actualiza la cantidad y el total para ese producto
        if (carrito.has(idProducto)) {
            let valorActual = carrito.get(idProducto);
            valorActual.cantidad += cantidad;
            valorActual.total += precio * cantidad;
            carrito.set(idProducto, valorActual);
        } else {
            carrito.set(idProducto, {cantidad: cantidad, total: precio});
        }
    }

    var total = 0;
    carrito.forEach((valor, clave) => {
        total += valor.total;
    });

    document.getElementById('totalCarrito').innerText = total.toFixed(2);
});

