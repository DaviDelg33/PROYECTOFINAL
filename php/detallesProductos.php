<link rel="stylesheet" href="../css/Detalles.css"/>
<?php
include '../php/conexion.php';
include '../php/Menu.php';
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="detalle-producto">';
        echo '<img class="imagen" src="' . $row['imagen'] . '" alt="' . $row['nombre'] . '">';
        echo '<div class="movida">';
        echo '<h2>' . $row['nombre'] . '</h2>';
        echo '<p class="precio">' . $row['precio'] . '€</p>';

        if (isset($_SESSION['username'])) {
            echo '<form id="formCarrito" action="" method="post">';
            echo '<input type="hidden" name="id_producto" value="' . $row['id_producto'] . '">';
            echo '<button type="submit" id="btnAgregarCarrito" class="btn-comprar" name="agregar_carrito">Añadir al carrito</button>';
            echo '<button type="button" class="btn-comprar" name="comprar">Comprar</button>';
            echo '</form>';
        } else {
            echo '<p>Debes <a href="../php/Inicio.php">iniciar sesión</a> para comprar o añadir productos al carrito.</p>';
        }

        echo '<h3>Descripción:</h3>';
        echo '<p class="descripcion">' . $row['descripcion_breve'] . '</p>';
        echo '<button class="btn-comprar" onclick="window.location.href=\'index.php\'">Volver a la tienda</button>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>El producto no existe.</p>';
    }
} else {
    echo '<p>No se ha especificado un producto.</p>';
}
$conn->close();
?>
<script src="../js/DetalleProd.js"></script>
