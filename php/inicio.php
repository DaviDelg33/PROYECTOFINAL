<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/inicio.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
            <video id="background-video" muted autoplay loop></video>
            <section class="container">
                <div class="row">
                    <div class="col-md-12">
                        <article class="titulo-inicio">
                            <h1>DABWARE</h1>
                            <h2>Donde Nuestro Mundo Importa</h2>
                        </article>
                    </div>
                </div>
            </section>
        </main>
        <div class="boton-abrir-formulario">&lt;</div>
        <div class="registro">
            <div class="contenedor-todo">
                <div class="contenedor-login-register">
                    <form action="" method="post" class="formulario-login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Usuario" name="usuario">
                        <input type="password" placeholder="Contraseña" name="pass">
                        <button type="button" id="btn-login">Entrar</button>
                        <button id="btn-mostrar-registro">Registrarse</button>
                        <button> <a href="../php/index.php">Entrar como Invitado</a></button>

                    </form>
                    <form action="" method="post" class="formulario-registro" style="display: none;">
                        <h2>Registrarse</h2>
                        <input type="text" placeholder="Nombre Completo" name="nombre">
                        <input type="text" placeholder="Apellido" name="apellido">
                        <input type="text" placeholder="Correo Electrónico" name="email">
                        <input type="text" placeholder="Usuario" name="usuario">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <input type="text" placeholder="Teléfono" name="telefono">
                        <button id="btn-registro" type="button">Registrarse</button>
                        <button id="btn-mostrar-login">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/animaForm.js"></script>
        <script src="../js/login.js"></script>
        <script src="../js/aleatorio.js"></script>
    </body>
</html>