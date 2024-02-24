<?php
echo '<div id="paginacion">';
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='?pagina=$i";
    if (!empty($searchText)) {
        echo "&search=$searchText";
    }
    if (!empty($categoria)) {
        echo "&categoria=$categoria";
    }
    echo "'>$i</a> ";
}
echo '</div>';
