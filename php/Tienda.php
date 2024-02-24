<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/menu.css">
        <?php include '../php/Menu.php' ?>
        <?php include '../php/conexion.php' ?>
        <link rel="stylesheet" href="../css/tienda.css"/>
        <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBeNRBEIWYeWRRvY8On_9pkSD1_J_zLykQ&sensor=false&callback=initMap"></script>
        <!-- src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"*/ -->
        <script src="../js/maps.js"></script>
    </head>
    <body>
        <main>
            <div class="barra">
                <input type="text" id="busqueda" placeholder="Buscar localidad" oninput="filtrarLocalidades()">
                <button id="search-button">Buscar</button>
                <div id="localidades-disponibles"></div> 
            </div>
            <div class="contenido">
                <div id="map-container"></div>
                <div class="ayuda" id="ayuda-tienda">
                </div> 
            </div>
            <div class="contenedor">
                <div class="Informacion">
                    <h2>Tienda de Informática Dabware</h2>
                    <p>Somos una tienda especializada en productos de informática ubicada en <strong>Toda España</strong>.</p>
                    <p>Ofrecemos una amplia gama de productos, incluyendo ordenadores, portátiles, periféricos, software y accesorios.</p>
                    <p>Nuestros servicios incluyen reparación de equipos, instalación de software, y asesoramiento técnico personalizado.</p>
                    <p>Horario de Apertura:</p>
                    <ul>
                        <li>Lunes a Viernes: 9:00 - 18:00</li>
                        <li>Sábado: 10:00 - 14:00</li>
                        <li>Domingo: Cerrado</li>
                    </ul>
                    <p>¡Visítanos y descubre cómo podemos ayudarte con tus necesidades informáticas!</p>
                </div>
                <script src="../js/carrusel.js"></script>
                <div class="Imagen">
                    <!-- Carrusel de imágenes -->
                    <div class="carrusel">
                        <img src="../img/tiendas/tienda.jpg"  class="img">
                        <button id="prevButton" class="ant">></button>
                        <button id="nextButton" class="sig"><</button>
                    </div>
                </div>
            </div>
        </main>
        <?php include '../php/footer.php'; ?>
    </body>
</html>