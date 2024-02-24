<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
    $id_producto = $_POST['id_producto']; // Asegúrate de validar y limpiar este valor
    $cantidad = 1; // O la cantidad que desees

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agrega o actualiza la cantidad del producto en el carrito
    if (!isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto] = $cantidad;
    } else {
        $_SESSION['carrito'][$id_producto] += $cantidad;
    }

    echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Carrito de Compras</title>
        <link rel="stylesheet" href="../css/carrito.css"/>
    </head>
    <body>
        <div class="relleno"></div>
        <div class="contenedor">
            <div class="tabla-carrito">
                <h1>Carrito de Compras</h1>
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                include '../php/conexion.php';

                if (!empty($_SESSION['carrito'])) {
                    // Iniciar tabla HTML
                    echo '<table border="1">';
                    echo '<tr><th>Foto</th><th>ID</th><th>Nombre</th><th>Marca</th><th>Precio</th></tr>';

                    // Iterar sobre cada producto en el carrito
                    foreach ($_SESSION['carrito'] as $id_producto => $cantidad) {
                        // Consulta para obtener los detalles del producto por ID
                        $sql = "SELECT id_producto, imagen, nombre, marca, precio FROM productos WHERE id_producto = $id_producto";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            // Mostrar los detalles del producto en la tabla
                            echo '<tr>';
                            echo '<td><img src="' . $row['imagen'] . '" style="width: 100px; height: auto;"></td>';
                            echo '<td>' . $row['id_producto'] . '</td>';
                            echo '<td>' . $row['nombre'] . '</td>';
                            echo '<td>' . $row['marca'] . '</td>';
                            echo '<td>' . $row['precio'] . '€</td>';
                            echo '<td><img src="../img/Icono/borrar.png" data-id="' . $row['id_producto'] . '" class="borrarCarrito" alt="Borrar" style="cursor:pointer;"/></td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                } else {
                    echo '<p>Tu carrito está vacío.</p>';
                }
                $conn->close();
                ?>
                <a href="index.php">Continuar comprando</a>
            </div>
            <div class="metodo-pago">
                <h2>Método de Pago</h2>
                <p>Seleccione su método de pago:</p>
                <div>
                    <input type="radio" id="tarjeta" name="metodo_pago" value="tarjeta">
                    <label for="tarjeta">Tarjeta de Crédito/Débito</label>
                </div>
                <div>
                    <input type="radio" id="paypal" name="metodo_pago" value="paypal">
                    <label for="paypal">PayPal</label>
                </div>
                <div>
                    <input type="radio" id="transferencia" name="metodo_pago" value="transferencia">
                    <label for="transferencia">Transferencia Bancaria</label>
                </div>
                <p>Total del carrito: <span id="totalCarrito">0</span>€</p>
                <button type="button">Continuar</button>
            </div>
        </div>
        <script src="../js/calculaProducto.js"></script>
        <script src="../js/eliminarCarrito.js"></script>
    </body>
</html>
