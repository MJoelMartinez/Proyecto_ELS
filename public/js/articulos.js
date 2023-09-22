const formularioModificarArticulos = document.getElementById("formularioModificarArticulos");
const botonFormularioModificarArticulos = document.getElementById("botonFormularioModificarArticulos");

const formularioEliminarArticulos = document.getElementById("formularioEliminarArticulos");
const botonFormularioEliminarArticulos = document.getElementById("botonFormularioEliminarArticulos");

botonFormularioModificarArticulos.addEventListener("click", function()
{
    let inputIDArticulo = document.getElementById("inputIDArticuloModificar");
    let valorInput = inputIDArticulo.value;
    formularioModificarArticulos.setAttribute("action", "api/v2/articulos/" +  valorInput);
});

botonFormularioEliminarArticulos.addEventListener("click", function()
{
    let inputIDArticulo = document.getElementById("inputIDArticuloEliminar");
    let valorInput = inputIDArticulo.value;
    formularioEliminarArticulos.setAttribute("action", "api/v2/articulos/" +  valorInput);
});
