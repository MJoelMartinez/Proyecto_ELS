let labelRol = document.getElementById("rolLabel");
let inputRol = document.getElementById("rolInput");
let selectRol = document.getElementById("rolDeLaEmpresa");

const labelCarnetCargador = document.getElementById("labelCarnetCargador");
const inputCarnetCargador = document.getElementById("inputCarnetCargador");

selectRol.onchange = function()
{
    CambiarValores();
}

function OcultarElementos()
{
    labelRol.style.display = "none";
    inputRol.style.display = "none";
}

function VisibilizarElementos()
{
    labelRol.style.display = "inline";
    inputRol.style.display = "inline";
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

    if (valor == "usuarioComun")
    {
        OcultarElementos();
        OcultarCarnet()
    }
    if (valor == "administrador")
    {
        VisibilizarElementos();
        OcultarCarnet()

        labelRol.innerHTML = "Número de Administrador: ";
    }
    if (valor == "gerente")
    {
        VisibilizarElementos();
        OcultarCarnet()

        labelRol.innerHTML = "Número de Gerente: ";
    }
    if (valor == "cargador")
    {
        VisibilizarElementos();
        VisibilizarCarnet();

        labelRol.innerHTML = "Número de Cargador: ";
    }
    if (valor == "chofer")
    {
        VisibilizarElementos();
        OcultarCarnet()

        labelRol.innerHTML = "Número de Chofer: ";
    }
}