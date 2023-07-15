let labelRol = document.getElementById("rolLabel");

let inputRol = document.getElementById("rolInput");

let selectRol = document.getElementById("rolDeLaEmpresa");

let formularioModificarUsuarios = document.getElementById("formularioModificarUsuarios");

let botonFormularioModificarUsuarios = document.getElementById("botonFormularioModificarUsuarios");

let formularioEliminarUsuarios = document.getElementById("formularioEliminarUsuarios");

let botonFormularioEliminarUsuarios = document.getElementById("botonFormularioEliminarUsuarios");

selectRol.onchange = function(){
    CambiarValores();
}

function visibilizarElementos(){
    labelRol.style.display = "inline";
    inputRol.style.display = "inline";
}

function ocultarLicencia(){
    labelLicencia.style.display = "none";
    inputLicencia.style.display = "none";
}

function visibilizarLicencia(){
    labelLicencia.style.display = "inline";
    inputLicencia.style.display = "inline";
}

function CambiarValores(){
    let valor = selectRol.options[selectRol.selectedIndex].value;

    if (valor == "usuarioComun"){
        labelRol.style.display = "none";
        inputRol.style.display = "none";
        ocultarLicencia();
    }
    if (valor == "administrador"){
        visibilizarElementos();
        ocultarLicencia();

        labelRol.innerHTML = "Número de Administrador: ";
        inputRol.setAttribute("name","numeroDeAdministrador");
    }
    if (valor == "gerente"){
        visibilizarElementos();
        ocultarLicencia();

        labelRol.innerHTML = "Número de Gerente: ";
        inputRol.setAttribute("name","numeroDeGerente");
    }
    if (valor == "cargador"){
        visibilizarElementos();
        ocultarLicencia();

        labelRol.innerHTML = "Número de Cargador: ";
        inputRol.setAttribute("name","numeroDeCargador");
    }
    if (valor == "chofer"){
        visibilizarElementos();
        visibilizarLicencia();

        labelRol.innerHTML = "Número de Chofer: ";
        inputRol.setAttribute("name","numeroDeChofer");
    }
}

botonFormularioModificarUsuarios.addEventListener("click", function() {
    let inputFormulario = document.getElementById("inputFormularioModificar");
    let valorInputFormulario = inputFormulario.value;
    formularioModificarUsuarios.setAttribute("action", "/Backoffice/Usuarios/Modificar/" +  valorInputFormulario);
});

botonFormularioEliminarUsuarios.addEventListener("click", function() {
    let inputFormulario = document.getElementById("inputFormularioEliminar");
    let valorInputFormulario = inputFormulario.value;
    formularioEliminarUsuarios.setAttribute("action", "/Backoffice/Usuarios/Eliminar/" +  valorInputFormulario);
});
