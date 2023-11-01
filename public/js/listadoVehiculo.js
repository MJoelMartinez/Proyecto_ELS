function revelarPreviewVehiculos(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGVehiculos.png)");
    $("#botonModelos").css("opacity", "50%");
}

function revelarPreviewModelos(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGModelos.png)");
    $("#botonVehiculo").css("opacity", "50%");
}

function restaurarBody(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGContenido.png)");
    $("#botonModelos").css("opacity", "100%");
    $("#botonVehiculo").css("opacity", "100%");
}

$("#botonModelos").mouseover(function() {
    revelarPreviewModelos();
});

$("#botonModelos").mouseout(function() {
    restaurarBody();
});

$("#botonVehiculo").mouseover("mouseover", function() {
    revelarPreviewVehiculos();
});

$("#botonVehiculo").mouseout(function() {
    restaurarBody();
});