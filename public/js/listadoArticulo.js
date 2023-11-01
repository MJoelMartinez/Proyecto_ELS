function revelarPreviewArticulo(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGArticuloListado.png)");
    $("#botonTipoArticulo").css("opacity", "50%");
}

function revelarPreviewTipoArticulo(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGTipoArticulo.png)");
    $("#botonArticulo").css("opacity", "50%");
}

function restaurarBody(){
    $(".contenedorAccesoAListas").css("background-image", "url(/img/BGArticulo.png)");
    $("#botonTipoArticulo").css("opacity", "100%");
    $("#botonArticulo").css("opacity", "100%");
}

$("#botonArticulo").mouseover(function() {
    revelarPreviewArticulo();
});

$("#botonArticulo").mouseout(function() {
    restaurarBody();
});

$("#botonTipoArticulo").mouseover("mouseover", function() {
    revelarPreviewTipoArticulo();
});

$("#botonTipoArticulo").mouseout(function() {
    restaurarBody();
});