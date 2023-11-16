import { ruta } from "./variables.js";

function revelarPreviewUsuarios(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGUsuarios.png)");
    $("#botonListaAlmacenes").css("opacity", "50%");
    $("#botonListaVehiculos").css("opacity", "50%");
    $("#botonListaArticulos").css("opacity", "50%");
    $("#botonListaTurnos").css("opacity", "50%");

}

function revelarPreviewAlmacenes(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGAlmacenes.png)");
    $("#botonListaUsuarios").css("opacity", "50%");
    $("#botonListaVehiculos").css("opacity", "50%");
    $("#botonListaArticulos").css("opacity", "50%");
    $("#botonListaTurnos").css("opacity", "50%");
}

function revelarPreviewVehiculos(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGContenido.png)");
    $("#botonListaUsuarios").css("opacity", "50%");
    $("#botonListaAlmacenes").css("opacity", "50%");
    $("#botonListaArticulos").css("opacity", "50%");
    $("#botonListaTurnos").css("opacity", "50%");
}

function revelarPreviewArticulos(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGArticulo.png)");
    $("#botonListaUsuarios").css("opacity", "50%");
    $("#botonListaAlmacenes").css("opacity", "50%");
    $("#botonListaVehiculos").css("opacity", "50%");
    $("#botonListaTurnos").css("opacity", "50%");
}

function revelarPreviewTurnos(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGTurno.png)");
    $("#botonListaUsuarios").css("opacity", "50%");
    $("#botonListaAlmacenes").css("opacity", "50%");
    $("#botonListaArticulos").css("opacity", "50%");
    $("#botonListaVehiculos").css("opacity", "50%");
}

function restaurarBody(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGBackOffice.png)");
    $("#botonListaUsuarios").css("opacity", "100%");
    $("#botonListaAlmacenes").css("opacity", "100%");
    $("#botonListaVehiculos").css("opacity", "100%");
    $("#botonListaArticulos").css("opacity", "100%");
    $("#botonListaTurnos").css("opacity", "100%");
}

$("#botonListaUsuarios").mouseover(function() {
    revelarPreviewUsuarios();
});

$("#botonListaUsuarios").mouseout(function() {
    restaurarBody();
});

$("#botonListaAlmacenes").mouseover("mouseover", function() {
    revelarPreviewAlmacenes();
});

$("#botonListaAlmacenes").mouseout(function() {
    restaurarBody();
});

$("#botonListaVehiculos").mouseover(function() {
    revelarPreviewVehiculos();
});

$("#botonListaVehiculos").mouseout(function() {
    restaurarBody();
});

$("#botonListaArticulos").mouseover(function() {
    revelarPreviewArticulos();
});

$("#botonListaArticulos").mouseout(function() {
    restaurarBody();
});

$("#botonListaTurnos").mouseover(function() {
    revelarPreviewTurnos();
});

$("#botonListaTurnos").mouseout(function() {
    restaurarBody();
});

function aplicarIngles() {
    document.cookie = "lang=en"
    location.reload()
}

function aplicarEspanol(){
    document.cookie = "lang=es"
    location.reload()
}

$('#idiomaDelSistema').click(function(){
    if(document.cookie.indexOf("lang=en") !== -1){
        aplicarEspanol()
    } else {
        aplicarIngles()
    }
});

$(document).ready(function () {
    if(document.cookie.indexOf("lang=en") !== -1){
        $('#idiomaDelSistema').css('background-image', 'url(/img/banderaUK.png)')
    } else {
        $('#idiomaDelSistema').css('background-image', 'url(/img/banderaUruguay.png)')
    }
    Promise.all([fetch(ruta), fetch('./json/elementos.json')])
    .then((responses) => Promise.all(responses.map((response) => response.json())))
    .then((data) => {
        const idioma = data[0];
        const arrayDeIdioma = idioma[9]
        const arrayDeTextos = data[1];
        const arrayDeTextos2 = arrayDeTextos[9]

        for (let posicion = 0; posicion < Object.keys(arrayDeTextos2).length; posicion++){
            let texto = document.getElementById(arrayDeTextos2[posicion])
            texto.textContent = arrayDeIdioma[posicion]
        }
    })
});