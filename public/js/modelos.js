import { ruta } from "./variables.js";

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
        const arrayDeIdioma = idioma[14]
        const arrayDeTextos = data[1];
        const arrayDeTextos2 = arrayDeTextos[14]

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