<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/Icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>E.L.S - Almacenes</title>
</head>
<body>
    <button id="AñadirAlmacen">Añadir Almacen</button>
    <br>
    <div class="NuevoAlmacen">
        <form action='/Backoffice/Almacenes/Crear' method='post'>
            @csrf
            <label>Capacidad: </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Direccion: </label>
            <input type="text" name="direccion" required>
            <button type="submit">Añadir</button>
        </form>
    </div>
    <button class="EliminarAlmacen">Eliminar Almacen</button>
    <div class="AlmacenAEliminar">
        <form id="formularioEliminarAlmacenes" action='/Backoffice/Almacenes/Eliminar' method='post'>
            @method('DELETE')
            @csrf
            <label>Id Almacen: </label>
            <input id="inputFormularioEliminar" type="number" name="idAlmacen">
            <br><br>
            <button id="botonFormularioEliminarAlmacenes" type="submit">Eliminar Almacen</button>
        </form>
    </div>
    <br>
    <div>
        <form id="formularioModificarAlmacenes" action='/Backoffice/Almacenes/Modificar' method='post'>
            @method('PUT')
            @csrf
            <label>Id de almacen: </label>
            <input id="inputFormularioModificar" type="number" name="idAlmacen" placeholder="Ej: 12">
            <br><br>
            <label>Capacidad: </label>
            <input type="number" name="capacidadAlmacen" placeholder="Ej: 250">
            <br><br>
            <label>Direccion: </label>
            <input type="text" name="direccionAlmacen" placeholder="Ej: chiwawa 2330">
            <br><br>
            <button id="botonFormularioModificarAlmacenes" type="submit">Modificar</button>
        </form>
    </div>
    <script src="../js/almacenes.js"></script>
</body>
</html>