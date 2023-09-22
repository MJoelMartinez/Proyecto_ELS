let selectRol = document.getElementById("rolDeLaEmpresa");

const labelCarnetCargador = document.getElementById("labelCarnetCargador");
const inputCarnetCargador = document.getElementById("inputCarnetCargador");

let formularioModificarUsuarios = document.getElementById("formularioModificarUsuarios");
let botonFormularioModificarUsuarios = document.getElementById("botonFormularioModificarUsuarios");

let formularioEliminarUsuarios = document.getElementById("formularioEliminarUsuarios");
let botonFormularioEliminarUsuarios = document.getElementById("botonFormularioEliminarUsuarios");

selectRol.onchange = function()
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
}

botonFormularioModificarUsuarios.addEventListener("click", function()
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
});