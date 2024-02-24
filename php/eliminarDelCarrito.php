<?php
session_start(); // Asegurarse de que la sesión esté iniciada.

$response = ['success' => false, 'message' => 'No se pudo eliminar el producto.'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['accion']) && $data['accion'] == 'eliminar' && isset($data['id_producto'])) {
        $id_producto = $data['id_producto'];

        if (isset($_SESSION['carrito'][$id_producto])) {
            unset($_SESSION['carrito'][$id_producto]);
            $response = ['success' => true, 'message' => 'Producto eliminado del carrito.'];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);