const botonFormularioAsignarPeso = document.getElementById("botonFormularioAsignarPeso");
const formularioAsignarPeso = document.getElementById("formularioAsignarPeso");

botonFormularioAsignarPeso.addEventListener("click", function() {
    let inputFormulario = document.getElementById("inputIDPaqueteAModificar");
    let valorInputFormulario = inputFormulario.value;
    formularioAsignarPeso.setAttribute("action", "http://localhost:8001/api/v1/Almacenes/Paquetes/" +  valorInputFormulario);
});