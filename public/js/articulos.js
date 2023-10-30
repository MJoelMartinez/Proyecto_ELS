$("#crearArticulo").click(function() {
    $("#ajusteBrillo").show();
    $("#contenedorCrear").show();
});

$("#cerrarContenedorCrear").click(function() {
    $("#ajusteBrillo").hide();
    $("#contenedorCrear").hide();
});

$("#botonBuscar").click(function(){
    $("#formularioBuscarArticulos").attr("action", "/articulos/buscar");
})

$("#botonCrearAlmacenes").click(function(){
    $("#formularioCrearArticulos").attr("action", "/articulos/crear");
})

$("#imagenBotonEditar").click(function() {
    $("#ajusteBrillo").show();
    $(".ArticuloAModificar").show();
    $("#formularioModificarArticulos").attr("action", "api/v2/articulos/" +  valorInput);
});

$("#cerrarContenedorModificar").click(function() {
    $("#ajusteBrillo").hide();
    $(".ArticuloAModificar").hide();
});


/*const formularioModificarArticulos = document.getElementById("formularioModificarArticulos");
const botonFormularioModificarArticulos = document.getElementById("botonFormularioModificarArticulos");

const formularioEliminarArticulos = document.getElementById("formularioEliminarArticulos");
const botonFormularioEliminarArticulos = document.getElementById("botonFormularioEliminarArticulos");

botonFormularioModificarArticulos.addEventListener("click", function()
{
    let inputIDArticulo = document.getElementById("inputIDArticuloModificar");
    let valorInput = inputIDArticulo.value;
    formularioModificarArticulos.setAttribute("action", "api/v2/articulos/" +  valorInput);
});

botonFormularioEliminarArticulos.addEventListener("click", function()
{
    let inputIDArticulo = document.getElementById("inputIDArticuloEliminar");
    let valorInput = inputIDArticulo.value;
    formularioEliminarArticulos.setAttribute("action", "api/v2/articulos/" +  valorInput);
});*/
