<?php
$conn = new mysqli("localhost", "root", "", "proyecto");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
