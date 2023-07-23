const botonFormularioEliminarAlmacen = document.getElementById("botonFormularioEliminarAlmacenes");
const formularioEliminarAlmacenes = document.getElementById("formularioEliminarAlmacenes");

const botonFormularioModificarAlmacen = document.getElementById("botonFormularioModificarAlmacenes");
const formularioModificarAlmacenes = document.getElementById("formularioModificarAlmacenes");

const botonFormularioModificarArticulos = document.getElementById("botonFormularioModificarArticulos");
const formularioModificarArticulos = document.getElementById("formularioModificarArticulos");

const botonFormularioEliminarArticulos = document.getElementById("botonFormularioEliminarArticulos");
const formularioEliminarArticulos = document.getElementById("formularioEliminarArticulos");

botonFormularioModificarArticulos.addEventListener("click", function()
{
    let inputFormulario = document.getElementById("inputFormularioModificarArticulos");
    let valorInputFormulario = inputFormulario.value;
    formularioModificarArticulos.setAttribute("action", "http://localhost:8001/api/v1/Almacenes/Articulos/" +  valorInputFormulario);
});

botonFormularioEliminarArticulos.addEventListener("click", function()
{
    let inputFormulario = document.getElementById("inputFormularioEliminarArticulos");
    let valorInputFormulario = inputFormulario.value;
    formularioEliminarArticulos.setAttribute("action", "http://localhost:8001/api/v1/Almacenes/Articulos/" +  valorInputFormulario);
});

botonFormularioModificarAlmacen.addEventListener("click", function()
{
    let inputFormulario = document.getElementById("inputFormularioModificar");
    let valorInputFormulario = inputFormulario.value;
    formularioModificarAlmacenes.setAttribute("action", "http://localhost:8001/api/v1/Backoffice/Almacenes/" +  valorInputFormulario);
});

botonFormularioEliminarAlmacen.addEventListener("click", function()
{
    let inputFormulario = document.getElementById("inputFormularioEliminar");
    let valorInputFormulario = inputFormulario.value;
    formularioEliminarAlmacenes.setAttribute("action", "http://localhost:8001/api/v1/Backoffice/Almacenes/" +  valorInputFormulario);
});