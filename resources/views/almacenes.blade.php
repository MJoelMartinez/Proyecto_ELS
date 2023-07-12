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
        <form action='/Backoffice/Almacen/Crear' method='post'>
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
    <div class="AlmacenEliminar">
        <form action="formularioEliminarAlmacen" action='/Backoffice/Almacen/Eliminar' method='post'>
            @method('DELETE')
            @csrf
            <label>Id Almacen: </label>
            <input type="number" name="idAlmacen">
            <br><br>
            <button type="submit">Eliminar Almacen</button>
        </form>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>