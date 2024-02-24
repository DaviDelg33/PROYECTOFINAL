<?php

include '../php/conexion.php';

$searchText = "";
if (isset($_GET['search'])) {
    $searchText = $_GET['search'];
}

$categoria = null;
if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
}

$elementosPorPagina = 20;
$paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $elementosPorPagina;

$sql = "SELECT p.* FROM productos p ";
$sql .= "LEFT JOIN productos_categoria pc ON p.id_producto = pc.id_producto ";
$sql .= "LEFT JOIN categoria c ON pc.id_categoria = c.id_categoria ";

$conditions = [];
if (!empty($searchText)) {
    $conditions[] = "(p.nombre LIKE '%$searchText%' OR c.tipo LIKE '%$searchText%')";
}
if (!empty($categoria)) {
    $conditions[] = "c.tipo = '$categoria'";
}

if (count($conditions) > 0) {
    $sql .= " WHERE " . join(' AND ', $conditions);
}

$sql .= " LIMIT $elementosPorPagina OFFSET $offset";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product" data-id="' . $row['id_producto'] . '">';
        echo '<img src="' . $row['imagen'] . '" alt="' . $row['nombre'] . '" style="width: 100%;">';
        echo '<div class="product-info">';
        echo '<h3>' . $row['nombre'] . '</h3>';
        echo '<p>' . $row['precio'] . '€</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No se encontraron resultados para la búsqueda: ' . $searchText . '</p>';
}

$sqlTotal = "SELECT COUNT(*) as total FROM productos p ";
$sqlTotal .= "LEFT JOIN productos_categoria pc ON p.id_producto = pc.id_producto ";
$sqlTotal .= "LEFT JOIN categoria c ON pc.id_categoria = c.id_categoria ";

if (count($conditions) > 0) {
    $sqlTotal .= " WHERE " . join(' AND ', $conditions);
}
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalElementos = $rowTotal['total'];
$totalPaginas = ceil($totalElementos / $elementosPorPagina);

$conn->close();
