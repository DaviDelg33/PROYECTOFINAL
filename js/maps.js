var tiendasdisp = [
    {name: 'Tienda 1', localidad: 'Barcelona', location: {lat: 41.39442624540421, lng: 2.132670358396411}},
    {name: 'Tienda 2', localidad: 'Madrid', location: {lat: 40.45203761226568, lng: -3.6903119193675744}},
    {name: 'Tienda 3', localidad: 'Sevilla', location: {lat: 37.39965933627599, lng: -5.963009176201347}},
    {name: 'Tienda 4', localidad: 'Zaragoza', location: {lat: 41.647514149134224, lng: -0.8792769191762738}},
    {name: 'Tienda 5', localidad: 'Aranda de Duero', location: {lat: 41.67178579876398, lng: -3.6914157838841675}},
    {name: 'Tienda 6', localidad: 'Valencia', location: {lat: 39.475653308214476, lng: -0.32660622998252425}},
    {name: 'Tienda 7', localidad: 'Palma', location: {lat: 39.572893638029235, lng: 2.6684052626067745}}
];

var map;
var markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map-container'), {
        center: {lat: 39.67464520796369, lng: -3.790052964417993},
        zoom: 6
    });

var estadoZoom = {
    zoomActivo: false,
    marcadorActivo: null
};

tiendasdisp.forEach(function (tienda, index) {
    var marker = new google.maps.Marker({
        position: tienda.location,
        map: map,
        title: tienda.name,
      icon: {
            url: '../img/icono/alfiler.png',
            scaledSize: new google.maps.Size(35, 35) // Ajusta estas dimensiones para cambiar el tamaño
        }
    });

    markers.push(marker);

    var informacion = new google.maps.InfoWindow({
        content: '<h3>' + tienda.name + '</h3><p>Localidad: ' + tienda.localidad + '<br>Coordinates: ' + tienda.location.lat + ', ' + tienda.location.lng + '</p>'
    });
    
    marker.addListener('click', function () {
        if (!estadoZoom.zoomActivo || estadoZoom.marcadorActivo !== marker) {
            informacion.open(map, marker);
            map.setCenter(marker.getPosition());
            map.setZoom(16);
            estadoZoom.zoomActivo = true;
            estadoZoom.marcadorActivo = marker;
        } else {
            map.setCenter({lat: 39.67464520796369, lng: -3.790052964417993});
            map.setZoom(6);
            estadoZoom.zoomActivo = false;
            estadoZoom.marcadorActivo = null;
        }
    });
});
}

function filtrarLocalidades() {
    var busqueda = document.getElementById('busqueda').value.toLowerCase();
    var localidades = tiendasdisp.map(function (tienda) {
        return tienda.localidad.toLowerCase();
    });

    var localidadesFiltradas = localidades.filter(function (localidad) {
        return localidad.includes(busqueda);
    });

    mostrarLocalidadesDisponibles(localidadesFiltradas);
}
function buscarTienda() {
    var localidad = document.getElementById('busqueda').value.trim();
    if (localidad !== '') {
        mostrarTienda(localidad);
    } else {
        alert('Por favor, ingrese una localidad válida.');
    }
}
function mostrarLocalidadesDisponibles(localidades) {
    var localidadesDiv = document.getElementById('localidades-disponibles');
    localidadesDiv.innerHTML = "";

    localidades.forEach(function (localidad) {
        var localidadHTML = "<div onclick='mostrarTienda(\"" + localidad + "\")'>" + localidad + "</div>";
        localidadesDiv.innerHTML += localidadHTML;
    });
}
function mostrarTienda(localidad) {
    var tiendaEncontrada = tiendasdisp.find(function (tienda) {
        return tienda.localidad.toLowerCase() === localidad.toLowerCase();
    });

    console.log(tiendaEncontrada);

    if (tiendaEncontrada) {
        var ayudaTiendaDiv = document.getElementById('ayuda-tienda');
        ayudaTiendaDiv.innerHTML = "<h2>" + tiendaEncontrada.name + "</h2>" +
                "<p>Calle: " + tiendaEncontrada.calle + "</p>" +
                "<p>Número de teléfono: " + tiendaEncontrada.numero_tel + "</p>" +
                "<p>Localidad: " + tiendaEncontrada.localidad + "</p>";

        ayudaTiendaDiv.innerHTML += "<img src='" + tiendaEncontrada.imagen + "' alt='Imagen de la tienda'>";

        map.setCenter(tiendaEncontrada.location);
        map.setZoom(16);

        var informacion = new google.maps.InfoWindow({
            content: '<h3>' + tiendaEncontrada.name + '</h3><p>Localidad: ' + tiendaEncontrada.localidad + '<br>Coordinates: ' + tiendaEncontrada.location.lat + ', ' + tiendaEncontrada.location.lng + '</p>'
        });
        informacion.open(map, markers[tiendasdisp.indexOf(tiendaEncontrada)]);
    } else {
        var ayudaTiendaDiv = document.getElementById('ayuda-tienda');
        ayudaTiendaDiv.innerHTML = "<p>No se encontró ninguna tienda para esta localidad.</p>";
    }
}