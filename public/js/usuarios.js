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

function OcultarElementos(){
    labelRol.style.display = "none";
    inputRol.style.display = "none";
}

function VisibilizarElementos(){
    labelRol.style.display = "inline";
    inputRol.style.display = "inline";
}

function CambiarValores(){
    let valor = selectRol.options[selectRol.selectedIndex].value;

    if (valor == "usuarioComun"){
        OcultarElementos();
    }
    if (valor == "administrador"){
        VisibilizarElementos();

        labelRol.innerHTML = "Número de Administrador: ";
    }
    if (valor == "gerente"){
        VisibilizarElementos();

        labelRol.innerHTML = "Número de Gerente: ";
    }
    if (valor == "cargador"){
        VisibilizarElementos();

        labelRol.innerHTML = "Número de Cargador: ";
    }
    if (valor == "chofer"){
        VisibilizarElementos();

        labelRol.innerHTML = "Número de Chofer: ";
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
