$("#crearTurno").click(function() {
    $("#ajusteBrillo").show();
    $(".contenedorCrearTurnos").show();
    $("#formularioCrearTurnos").attr("action", "api/v2/turnos/" +  valorInput);
});

$("#cerrarContenedorCrear").click(function() {
    $("#ajusteBrillo").hide();
    $("#contenedorCrear").hide();
});

$("#eliminarTurno").click(function() {
    $("#ajusteBrillo").show();
    $(".contenedorEliminarTurnos").show();
    $("#formularioEliminarTurnos").attr("action", "api/v2/turnos/" +  valorInput);
});

$("#cerrarContenedorEliminar").click(function() {
    $("#ajusteBrillo").hide();
    $("#contenedorEliminar").hide();
});

/*const formularioEliminarTurnos = document.getElementById("formularioEliminarTurnos");
const botonFormularioEliminarTurnos = document.getElementById("botonFormularioEliminarTurnos");

botonFormularioEliminarTurnos.addEventListener("click", function()
{
    let inputIDTurno = document.getElementById("inputIDTurnoEliminar");
    let valorInput = inputIDTurno.value;
    formularioEliminarTurnos.setAttribute("action", "api/v2/turnos/" +  valorInput);
});*/