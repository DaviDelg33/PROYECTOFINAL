<?php

session_start();
include 'conexion.php'; // Asegúrate de que la ruta es correcta

$json = file_get_contents('php://input');
$datos = json_decode($json);

if (isset($datos->login)) {
    $usuario = $datos->usuario;
    $pass = $datos->contrasena;
    $sql = "SELECT * FROM registro_usuario WHERE usuario = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['usuario'];
        $_SESSION['nombreCompleto'] = $user['nombre'] . ' ' . $user['apellido']; // Nombre completo para mostrar
        echo json_encode(["success" => true, "redirect" => "index.php"]);
    } else {
        echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos."]);
    }
} elseif (isset($datos->registro)) {
    // Procesamiento del registro
    $nombre = $datos->nombre;
    $apellido = $datos->apellido;
    $email = $datos->email;
    $usuario = $datos->usuario;
    $pass = $datos->contrasena;
    $telefono = $datos->telefono;

    $sql = "SELECT * FROM registro_usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "El usuario ya está registrado. Por favor, elija otro nombre de usuario."]);
    } else {
        $sql = "INSERT INTO registro_usuario (nombre, apellido, email, usuario, pass, telefono) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $nombre, $apellido, $email, $usuario, $pass, $telefono);
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "redirect" => "index.php"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al registrar el usuario."]);
        }
    }
}
$conn->close();
?>