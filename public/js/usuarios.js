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
})

$("#cerrarContenedorCrear").click(function(){
    $("#ajusteBrillo").hide();
    $(".contenedorCrearUsuarios").hide();
})

$("#botonBuscar").click(function(){
    $("#formularioBuscarUsuarios").attr("action", urlAPIAlmacenes + "/api/v1/buscarUsuarios");
})

$("#botonCrearUsuario").click(function(){
    $("#formularioCrearUsuarios").attr("action", urlAPIAlmacenes + "/api/v1/usuarios");
})

/*let selectRol = document.getElementById("rolDeLaEmpresa");

const labelCarnetCargador = document.getElementById("labelCarnetCargador");
const inputCarnetCargador = document.getElementById("inputCarnetCargador");*/

/*let formularioModificarUsuarios = document.getElementById("formularioModificarUsuarios");
let botonFormularioModificarUsuarios = document.getElementById("botonFormularioModificarUsuarios");

let formularioEliminarUsuarios = document.getElementById("formularioEliminarUsuarios");
let botonFormularioEliminarUsuarios = document.getElementById("botonFormularioEliminarUsuarios");*/

/*selectRol.onchange = function()
{
    CambiarValores();
}

function OcultarCarnet()
{
    labelCarnetCargador.style.display = "none";
    inputCarnetCargador.style.display = "none";
}

function VisibilizarCarnet()
{
    labelCarnetCargador.style.display = "inline";
    inputCarnetCargador.style.display = "inline";
}

function CambiarValores()
{
    let valor = selectRol.options[selectRol.selectedIndex].value;

    if (valor != "cargador")
    {
        OcultarCarnet();
    }
    if (valor == "cargador")
    {
        VisibilizarCarnet();
    }
}*/

/*botonFormularioModificarUsuarios.addEventListener("click", function()
{
    let inputFormulario = document.getElementById("inputFormularioModificar");
    let valorInputFormulario = inputFormulario.value;
    formularioModificarUsuarios.setAttribute("action", "api/v2/usuarios/" +  valorInputFormulario);
});

botonFormularioEliminarUsuarios.addEventListener("click", function()
{
    let inputFormulario = document.getElementById("inputFormularioEliminar");
    let valorInputFormulario = inputFormulario.value;
    formularioEliminarUsuarios.setAttribute("action", "api/v2/usuarios/" +  valorInputFormulario);
});*/