<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div id="contenedorCrear">
        <h3>Crear Almacén:</h3>
        <form action='api/v2/almacenes' method='POST'>
            @csrf
            <label>Direccion: </label>
            <input type="text" name="direccion" min="2" max="40" required>
            <br><br>
            <label>Capacidad (m3): </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Departamento: </label>
            <input type="number" name="idDepartamento" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorModificar">
        <h3>Modificar Almacén:</h3>
        <form id="formularioModificarAlmacenes" action='api/v2/almacenes' method='POST'>
            @method('PUT')
            @csrf
            <label>ID del Almacén: </label>
            <input id="inputIDAlmacenModificar" type="number" name="idAlmacen" required>
            <br><br>
            <label>Direccion: </label>
            <input type="text" name="direccion" min="2" max="40" required>
            <br><br>
            <label>Capacidad (m3): </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <button id="botonFormularioModificarAlmacenes" type="submit">Modificar</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorEliminar">
        <h3>Eliminar Almacén:</h3>
        <form id="formularioEliminarAlmacenes" action='api/v2/almacenes' method='POST'>
            @method('DELETE')
            @csrf
            <label>ID del Almacén: </label>
            <input id="inputIDAlmacenEliminar" type="number" name="idAlmacen" required>
            <br><br>
            <button id="botonFormularioEliminarAlmacenes" type="submit">Eliminar</button>
        </form>
    </div>
    <script src="../js/almacenes.js"></script>
</body>
</html>