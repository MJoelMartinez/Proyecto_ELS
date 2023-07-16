const botonFormularioEliminarAlmacen = document.getElementById("botonFormularioEliminarAlmacenes");

const formularioEliminarAlmacenes = document.getElementById("formularioEliminarAlmacenes");

const botonFormularioModificarAlmacen = document.getElementById("botonFormularioModificarAlmacenes");

const formularioModificarAlmacenes = document.getElementById("formularioModificarAlmacenes");

botonFormularioModificarAlmacen.addEventListener("click", function() {
    let inputFormulario = document.getElementById("inputFormularioModificar");
    let valorInputFormulario = inputFormulario.value;
    formularioModificarAlmacenes.setAttribute("action", "/Backoffice/Almacenes/Modificar/" +  valorInputFormulario);
});

botonFormularioEliminarAlmacen.addEventListener("click", function() {
    let inputFormulario = document.getElementById("inputFormularioEliminar");
    let valorInputFormulario = inputFormulario.value;
    formularioEliminarAlmacenes.setAttribute("action", "/Backoffice/Almacenes/Eliminar/" +  valorInputFormulario);
});