import { ruta } from "./variables.js";

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
});

$("#botonCrearAlmacenes").click(function(){
    $("#formularioCrearArticulos").attr("action", "/articulos/crear");
});

$("#imagenBotonEditar").click(function() {
    $("#ajusteBrillo").show();
    $(".ArticuloAModificar").show();
    $("#formularioModificarArticulos").attr("action", "api/v2/articulos/" +  valorInput);
});

$("#cerrarContenedorModificar").click(function() {
    $("#ajusteBrillo").hide();
    $(".ArticuloAModificar").hide();
});

$("#imagenBotonEliminar").click(function() {
    $("#ajusteBrillo").show();
    $(".ArticuloAEliminar").show();
    $("#formularioEliminarArticulos").attr("action", "api/v2/articulos/" +  valorInput);
});

$("#cerrarContenedorEliminar").click(function() {
    $("#ajusteBrillo").hide();
    $(".ArticuloAEliminar").hide();
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
        const arrayDeIdioma = idioma[11]
        const arrayDeTextos = data[1];
        const arrayDeTextos2 = arrayDeTextos[11]
        console.log(arrayDeTextos2)

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
