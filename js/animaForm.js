document.addEventListener('DOMContentLoaded', function () {
    const botonAbrir = document.querySelector('.boton-abrir-formulario');
    const contenedorFormulario = document.querySelector('.registro');
    const botonMostrarRegistro = document.getElementById('btn-mostrar-registro');
    const botonMostrarLogin = document.getElementById('btn-mostrar-login');
    const formularioLogin = document.querySelector('.formulario-login');
    const formularioRegistro = document.querySelector('.formulario-registro');

    botonAbrir.addEventListener('mouseover', function () {
        contenedorFormulario.style.transform = 'translateX(0)'; // Muestra el formulario
    });

    contenedorFormulario.addEventListener('mouseleave', function () {
        contenedorFormulario.style.transform = 'translateX(100%)'; // Oculta el formulario
    });

    botonMostrarRegistro.addEventListener('click', function (e) {
        e.preventDefault(); 
        formularioLogin.style.display = 'none'; // Oculta el formulario de login
        formularioRegistro.style.display = 'block'; // Muestra el formulario de registro
    });

    botonMostrarLogin.addEventListener('click', function (e) {
        e.preventDefault(); 
        formularioRegistro.style.display = 'none'; // Oculta el formulario de registro
        formularioLogin.style.display = 'block'; // Muestra el formulario de login
    });
});
