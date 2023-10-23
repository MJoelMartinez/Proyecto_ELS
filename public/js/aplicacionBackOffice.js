function revelarPreviewUsuarios(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGUsuarios.png)");
    $("#botonListaAlmacenes").css("opacity", "50%");
    $("#botonListaVehiculos").css("opacity", "50%");
}

function revelarPreviewAlmacenes(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGAlmacenes.png)");
    $("#botonListaUsuarios").css("opacity", "50%");
    $("#botonListaVehiculos").css("opacity", "50%");
}

function revelarPreviewVehiculos(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGVehiculos.png)");
    $("#botonListaUsuarios").css("opacity", "50%");
    $("#botonListaAlmacenes").css("opacity", "50%");
}

function restaurarBody(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGBackOffice.png)");
    $("#botonListaUsuarios").css("opacity", "100%");
    $("#botonListaAlmacenes").css("opacity", "100%");
    $("#botonListaVehiculos").css("opacity", "100%");
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