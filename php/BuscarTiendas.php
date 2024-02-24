<?php
include 'conexion.php'; 

$localidad = isset($_GET['localidad']) ? $_GET['localidad'] : '';

$sql = $localidad ? "SELECT * FROM tiendas WHERE localidad LIKE '%$localidad%'" : "SELECT * FROM tiendas";

$result = $conn->query($sql); 

$tiendas = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tiendas[] = $row; 
    }
}

echo json_encode($tiendas); 

$conn->close(); 
?>