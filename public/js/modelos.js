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
})

$("#botonCrearAlmacenes").click(function(){
    $("#formularioCrearModelos").attr("action", "/modelos/crear");
})


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