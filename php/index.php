<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Dabware</title>
        <link rel="shortcut icon" href="Captura.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/menu.css">
        <script src="../js/Buscar.js"></script>
        <?php include '../php/Menu.php'; ?>
    </head>
    <body>
        <div class="container flex-container">
            <div class="filters-container">
                <ul class="menu">
                    <h2>Menu</h2>
                    <li class="company-btn"><a href="?categoria=Pc">Pc</a></li>
                    <li class="company-btn"><a href="?categoria=Portátiles">Portátiles</a></li>
                    <li class="company-btn"><a href="?categoria=Television">Television</a></li>
                    <li class="company-btn"><a href="?categoria=Móviles">Móviles</a></li>
                    <li class="company-btn"><a href="?categoria=Componentes">Componentes</a></li>
                    <li class="company-btn"><a href="?categoria=Productos%20Dabware">Productos Dabware</a></li>
                    <li class="company-btn"><a href="?categoria=Segunda%20Mano">Segunda Mano</a></li>
                    <li class="company-btn"><a href="?categoria=Perifericos">Perifericos</a></li>
                    <li class="company-btn"><a href="index.php">Ver Todos</a></li>
                </ul>
                <div class="comentarios">
                    <h2 class="rese">Reseñas</h2>
                    <div class="usuario"></div>
                    <script src="../js/comentarios.js"></script>
                </div>
            </div>
            <section class="general">
                <div class="products-container">
                    <?php
                    include '../php/productos.php';
                    ?>
                </div>
            </section>
        </div>
        <?php
        include '../php/botones.php';
        ?>
        <script src="../js/navegacion.js"></script>
        <?php
        include '../php/footer.php';
        ?>
    </body>
</html>