import { ruta } from "./variables.js";

$("#crearAlmacen").click(function() {
    $("#ajusteBrillo").show();
    $("#contenedorCrear").show();
});

$("#cerrarContenedorCrear").click(function() {
    $("#ajusteBrillo").hide();
    $("#contenedorCrear").hide();
});

$("#botonBuscar").click(function(){
    $("#formularioBuscarAlmacenes").attr("action", "/almacenes/buscar");
});

$("#botonCrearAlmacenes").click(function(){
    $("#formularioCrearAlmacenes").attr("action", "/almacenes/crear");
});

$("#imagenBotonEditar").click(function() {
    $("#ajusteBrillo").show();
    $(".AlmacenAModificar").show();
    $("#formularioModificarAlmacenes").attr("action", "api/v2/almacenes/" + valorInput);
});

$("#cerrarContenedorModificar").click(function() {
    $("#ajusteBrillo").hide();
    $(".AlmacenAModificar").hide();
});

$("#imagenBotonEliminar").click(function() {
    $("#ajusteBrillo").show();
    $(".AlmacenAEliminar").show();
    $("#formularioEliminarAlmacenes").attr("action", "api/v2/almacenes/" + valorInput);
});

$("#cerrarContenedorEliminar").click(function() {
    $("#ajusteBrillo").hide();
    $(".AlmacenAEliminar").hide();
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
        const arrayDeIdioma = idioma[10]
        const arrayDeTextos = data[1];
        const arrayDeTextos2 = arrayDeTextos[10]

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

/*const formularioModificarAlmacenes = document.getElementById("formularioModificarAlmacenes");
const botonFormularioModificarAlmacenes= document.getElementById("botonFormularioModificarAlmacenes");

const formularioEliminarAlmacenes = document.getElementById("formularioEliminarAlmacenes");
const botonFormularioEliminarAlmacenes = document.getElementById("botonFormularioEliminarAlmacenes");

botonFormularioModificarAlmacenes.addEventListener("click", function()
{
    let inputIDAlmacen = document.getElementById("inputIDAlmacenModificar");
    let valorInput = inputIDAlmacen.value;
    formularioModificarAlmacenes.setAttribute("action", "api/v2/almacenes/" +  valorInput);
});

botonFormularioEliminarAlmacenes.addEventListener("click", function()
{
    let inputIDAlmacen = document.getElementById("inputIDAlmacenEliminar");
    let valorInput = inputIDAlmacen.value;
    formularioEliminarAlmacenes.setAttribute("action", "api/v2/almacenes/" +  valorInput);
});*/