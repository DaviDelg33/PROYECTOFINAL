document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.borrarCarrito').forEach(function(boton) {
        boton.addEventListener('click', function() {
            var idProducto = this.getAttribute('data-id');
            eliminarProducto(idProducto);
        });
    });
});

function eliminarProducto(id_producto) {
    if (!confirm('¿Estás seguro de que quieres eliminar este producto del carrito?')) {
        return;
    }

    var data = {accion: 'eliminar', id_producto: id_producto};

    fetch('../php/eliminarDelCarrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}