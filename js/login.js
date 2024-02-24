document.addEventListener("DOMContentLoaded", function () {
    // Manejador de inicio de sesión
    document.getElementById("btn-login").addEventListener("click", function (event) {
        event.preventDefault();

        var usuario = document.querySelector(".formulario-login input[name=usuario]").value;
        var pass = document.querySelector(".formulario-login input[name=pass]").value;

        var datos = {usuario: usuario, contrasena: pass, login: true};

        fetch("../php/registro.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(datos)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });

    // Manejador de registro
    document.getElementById("btn-registro").addEventListener("click", function (event) {
        event.preventDefault();

        var nombre = document.querySelector(".formulario-registro input[name=nombre]").value;
        var apellido = document.querySelector(".formulario-registro input[name=apellido]").value;
        var email = document.querySelector(".formulario-registro input[name=email]").value;
        var usuario = document.querySelector(".formulario-registro input[name=usuario]").value;
        var contrasena = document.querySelector(".formulario-registro input[name=contrasena]").value;
        var telefono = document.querySelector(".formulario-registro input[name=telefono]").value;

        if (!nombre || !apellido || !email || !usuario || !contrasena || !telefono) {
                alert('Todos los campos son obligatorios.');
                return;
            }

            if (!email.endsWith("@gmail.com")) {
                alert('El correo debe ser una dirección @gmail.com.');
                return;
            }

            if (!/[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+/.test(nombre) || !/[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+/.test(apellido)) {
                alert('El nombre y apellido deben empezar con mayúsculas.');
                return;
            }

            if (!/\d/.test(contrasena) || !/[A-Z]/.test(contrasena)) {
                alert('La contraseña debe tener al menos un número y una mayúscula.');
                return;
            }

            if (!/^\+34/.test(telefono)) {
                alert('El teléfono debe comenzar con el prefijo de España (+34).');
                return;
            }

        var datos = {
            nombre: nombre,
            apellido: apellido,
            email: email,
            usuario: usuario,
            contrasena: contrasena,
            telefono: telefono,
            registro: true
        };

        fetch("registro.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(datos)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Registro completado.');
                window.location.href = data.redirect;
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });
});