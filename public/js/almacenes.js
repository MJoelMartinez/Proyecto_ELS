let botonFormularioEliminarAlmacen = document.getElementById("botonFormularioEliminarAlmacenes");

let formularioEliminarAlmacenes = document.getElementById("formularioEliminarAlmacenes");

botonFormularioEliminarAlmacen.addEventListener("click", function() {
    let inputFormulario = document.getElementById("inputFormularioEliminar");
    let valorInputFormulario = inputFormulario.value;
    formularioEliminarAlmacenes.setAttribute("action", "/Backoffice/Almacenes/Eliminar/" +  valorInputFormulario);
});