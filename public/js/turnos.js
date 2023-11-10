import { ruta } from "./variables.js";

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

function aplicarIngles() {
    document.cookie = "lang=en;path=/"
    location.reload()
  }
  
  function aplicarEspanol(){
    document.cookie = "lang=es;path=/"
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
    Promise.all([fetch('/' + ruta), fetch('/json/elementos.json')])
    .then((responses) => Promise.all(responses.map((response) => response.json())))
    .then((data) => {
        const idioma = data[0];
        const arrayDeIdioma = idioma[16]
        const arrayDeTextos = data[1];
        const arrayDeTextos2 = arrayDeTextos[16]
        console.log(arrayDeTextos2)
        console.log(arrayDeIdioma)

        for (let posicion = 0; posicion < Object.keys(arrayDeTextos2).length; posicion++){
            let texto = document.getElementById(arrayDeTextos2[posicion])
            console.log(texto)
            if (texto.nodeName == "INPUT"){
                texto.placeholder = arrayDeIdioma[posicion]
            } else {
                texto.textContent = arrayDeIdioma[posicion]
            }
        }
    })

});

/*const formularioEliminarTurnos = document.getElementById("formularioEliminarTurnos");
const botonFormularioEliminarTurnos = document.getElementById("botonFormularioEliminarTurnos");

botonFormularioEliminarTurnos.addEventListener("click", function()
{
    let inputIDTurno = document.getElementById("inputIDTurnoEliminar");
    let valorInput = inputIDTurno.value;
    formularioEliminarTurnos.setAttribute("action", "api/v2/turnos/" +  valorInput);
});*/