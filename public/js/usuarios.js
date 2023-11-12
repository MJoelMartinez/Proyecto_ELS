import { ruta } from "./variables.js";

$(document).ready(function () {
    const selectRol = $("#rolDeLaEmpresa");
    const divCarnetCargador = $("#divCarnetCargador");
    const divGerente = $("#divGerente");
    const divChofer = $("#divChofer");

    OcultarDivCarnetCargador();
    OcultarDivGerente();
    OcultarDivChofer();

    selectRol.on("change", function () {
        CambiarValores();
    });

    function OcultarDivCarnetCargador() {
        divCarnetCargador.css("display", "none");
    }

    function MostrarDivCarnetCargador() {
        divCarnetCargador.css("display", "block");
    }

    function OcultarDivGerente() {
        divGerente.css("display", "none");
    }

    function MostrarDivGerente() {
        divGerente.css("display", "block");
    }

    function OcultarDivChofer() {
        divChofer.css("display", "none");
    }

    function MostrarDivChofer() {
        divChofer.css("display", "block");
    }

    function CambiarValores() {
        let valor = selectRol.val();

        if (valor === "cargador") {
            MostrarDivCarnetCargador();
            OcultarDivGerente();
            OcultarDivChofer();
        } else if (valor === "chofer") {
            OcultarDivCarnetCargador();
            OcultarDivGerente();
            MostrarDivChofer();
        } else if (valor === "gerente") {
            OcultarDivCarnetCargador();
            MostrarDivGerente();
            OcultarDivChofer();
        } else {
            OcultarDivCarnetCargador();
            OcultarDivGerente();
            OcultarDivChofer();
        }
    }
});

$("#crearUsuario").click(function(){
    $("#ajusteBrillo").show();
    $(".contenedorCrearUsuarios").show();
});

$("#cerrarContenedorCrear").click(function(){
    $("#ajusteBrillo").hide();
    $(".contenedorCrearUsuarios").hide();
});

$("#botonBuscar").click(function(){
    $("#formularioBuscarUsuarios").attr("action", "/usuarios/buscar");
});

$("#botonCrearUsuario").click(function(){
    $("#formularioCrearUsuarios").attr("action", "/usuarios/crear");
});
    

$("#imagenBotonEditar").click(function() {
    $("#ajusteBrillo").show();
    $(".UsuarioAModificar").show();
});

$("#cerrarContenedorModificar").click(function() {
    $("#ajusteBrillo").hide();
    $(".UsuarioAModificar").hide();
});

$("#imagenBotonEliminar").click(function() {
    $("#ajusteBrillo").show();
    $(".UsuarioAEliminar").show();
});

$("#cerrarContenedorEliminar").click(function() {
    $("#ajusteBrillo").hide();
    $(".UsuarioAEliminar").hide();
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
        const arrayDeIdioma = idioma[17]
        const arrayDeTextos = data[1];
        const arrayDeTextos2 = arrayDeTextos[17]

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