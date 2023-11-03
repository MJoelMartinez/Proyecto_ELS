<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.L.S - Lista de Modelos de Vehículos</title>
</head>
<body>
    <div id="contenedorCrear">
        <form action="api/v2/modelos" method="POST">
            @csrf
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Año de creación: </label>
            <input type="number" name="anio" min="2000" max="9999" required>
            <br><br>
            <button type="submit">Añadir modelo</button>
        </form>
    </div>
    <div id="contenedorModificar">
        <form id="formularioModificarModelos" action="api/v2/modelos" method="POST">
            @method('PUT')
            @csrf
            <label>ID Modelo:<label>
            <input type="number" id="inputIDModeloModificar" name="idModelo" required>
            <br><br>
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Año de creación: </label>
            <input type="number" name="anio" min="2000" max="9999" required>
            <br><br>
            <button id="botonFormularioModificarModelos" type="submit">Modificar modelo</button>
        </form>
    </div>
    <div id="contenedorEliminar">
        <form id="formularioEliminarModelos" action="api/v2/modelos" method="POST">
            @method('DELETE')
            @csrf
            <label>ID Modelo:<label>
            <input type="number" id="inputIDModeloEliminar" name="idModelo" required>
            <br><br>
            <button id="botonFormularioEliminarModelos" type="submit">Eliminar modelo</button>
        </form>
    </div>
    <script src="../js/modelos.js"></script>
</body>
</html>