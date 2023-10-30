$("#crearModelo").click(function() {
    $("#ajusteBrillo").show();
    $("#contenedorCrear").show();
});

$("#cerrarContenedorCrear").click(function() {
    $("#ajusteBrillo").hide();
    $("#contenedorCrear").hide();
});

$("#botonBuscar").click(function(){
    $("#formularioBuscarModelos").attr("action", "/modelos/buscar");
});

$("#botonCrearAlmacenes").click(function(){
    $("#formularioCrearModelos").attr("action", "/modelos/crear");
});

$("#imagenBotonEditar").click(function() {
    $("#ajusteBrillo").show();
    $(".ModeloAModificar").show();
    $("#formularioModificarModelos").attr("action", "api/v2/modelos/" +  valorInput);
});

$("#cerrarContenedorModificar").click(function() {
    $("#ajusteBrillo").hide();
    $(".ModeloAModificar").hide();
});

$("#imagenBotonEliminar").click(function() {
    $("#ajusteBrillo").show();
    $(".ModeloAEliminar").show();
    $("#formularioEliminarModelos").attr("action", "api/v2/modelos/" +  valorInput);
});

$("#cerrarContenedorEliminar").click(function() {
    $("#ajusteBrillo").hide();
    $(".ModeloAEliminar").hide();
});

/*const formularioModificarModelos = document.getElementById("formularioModificarModelos");
const botonFormularioModificarModelos = document.getElementById("botonFormularioModificarModelos");

const formularioEliminarModelos = document.getElementById("formularioEliminarModelos");
const botonFormularioEliminarModelos = document.getElementById("botonFormularioEliminarModelos");

botonFormularioModificarModelos.addEventListener("click", function()
{
    let inputIDModelo = document.getElementById("inputIDModeloModificar");
    let valorInput = inputIDModelo.value;
    formularioModificarModelos.setAttribute("action", "api/v2/modelos/" +  valorInput);
});

botonFormularioEliminarModelos.addEventListener("click", function()
{
    let inputIDModelo = document.getElementById("inputIDModeloEliminar");
    let valorInput = inputIDModelo.value;
    formularioEliminarModelos.setAttribute("action", "api/v2/modelos/" +  valorInput);
});*/