$("#crearTurno").click(function() {
    $("#ajusteBrillo").show();
    $(".contenedorCrearTurnos").show();
  });

$("#cerrarContenedorCrear").click(function() {
    $("#ajusteBrillo").hide();
    $(".contenedorCrearTurnos").hide();
});


/*const formularioEliminarTurnos = document.getElementById("formularioEliminarTurnos");
const botonFormularioEliminarTurnos = document.getElementById("botonFormularioEliminarTurnos");

botonFormularioEliminarTurnos.addEventListener("click", function()
{
    let inputIDTurno = document.getElementById("inputIDTurnoEliminar");
    let valorInput = inputIDTurno.value;
    formularioEliminarTurnos.setAttribute("action", "api/v2/turnos/" +  valorInput);
});*/