<!DOCTYPE html>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='../css/menu.css'>
        <script src='../js/buscar.js'></script>
    </head>
    <body>
        <header class="menuPrin">
            <img class="logo" src="../img/log/Logo.png" alt="alt"/>
            <form id="search-form" class="input-form">
                <input id="search-input" type="text" class="search-input" placeholder="Buscar un Producto..." />
                <!-- <div class="reloj-container">
                    <span id="reloj" class="reloj"></span>
                </div>
                <script src="../js/reloj.js"></script>-->
            </form>
            <nav class="indice">
                <ul>
                    <li><a href="../php/Carrito.php"><img src="../img/Icono/carro-de-la-carretilla.png" alt=""/></a></li>
                    <li><a href="../php/inicio.php">Inicio</a></li>
                    <li><a href="../php/index.php">Productos</a></li>
                    <li><a href="../php/Tienda.php">Tiendas</a></li>
                    <li>
                        <a id="icono-usuario" href="#">
                            <img src="../img/Icono/usuario.png" alt="Usuario"/>
                        </a>
                        <div id="nombre-usuario" class="nombreVentana" style="display:none;">
                            <?php if (isset($_SESSION['nombreCompleto'])): ?>
                                <a><?php echo htmlspecialchars($_SESSION['nombreCompleto']); ?></a>
                                <a href="miCuenta.php">Mi Cuenta</a>
                                <a href="cerrarSesion.php">Cerrar Sesión</a>
                            <?php else: ?>
                                <a>Invitado</a>
                                <a href="inicio.php">Iniciar Sesión</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const iconoUsuario = document.getElementById('icono-usuario');
                const nombreUsuarioVentana = document.getElementById('nombre-usuario');

                iconoUsuario.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevenir la navegación
                    if (nombreUsuarioVentana.style.display === 'none' || !nombreUsuarioVentana.style.display) {
                        nombreUsuarioVentana.style.display = 'block';
                    } else {
                        nombreUsuarioVentana.style.display = 'none';
                    }
                });

                document.addEventListener('click', function (e) {
                    if (!iconoUsuario.contains(e.target)) {
                        nombreUsuarioVentana.style.display = 'none';
                    }
                });
            });
            document.addEventListener('click', function (e) {
                if (!iconoUsuario.contains(e.target) && e.target.tagName !== 'A') { // Asegurar que no se cierra al hacer clic en un enlace
                    nombreUsuarioVentana.style.display = 'none';
                }
            });
        </script>
    </body>
</html>