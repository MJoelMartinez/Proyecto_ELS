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
    <h3>Añadir Almacen</h3>
    <div class="NuevoAlmacen">
        <form action='http://localhost:8001/api/v1/Backoffice/Almacenes' method='post'>
            @csrf
            <label>Capacidad: </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Direccion: </label>
            <input type="text" name="direccion" required>
            <br><br>
            <button type="submit">Añadir</button>
        </form>
    </div>

    <br><br>

    <h3>Eliminar Almacen</h3>
    <div class="AlmacenAEliminar">
        <form id="formularioEliminarAlmacenes" action='http://localhost:8001/api/v1/Backoffice/Almacenes' method='post'>
            @method('DELETE')
            @csrf
            <label>Id Almacen: </label>
            <input id="inputFormularioEliminar" type="number" name="idAlmacen" >
            <br><br>
            <button id="botonFormularioEliminarAlmacenes" type="submit">Eliminar Almacen</button>
        </form>
    </div>

    <br><br>

    <h3>Modificar Almacen</h3>
    <div>
        <form id="formularioModificarAlmacenes" action='http://localhost:8001/api/v1/Backoffice/Almacenes' method='post'>
            @method('PUT')
            @csrf
            <label>Id de almacen: </label>
            <input id="inputFormularioModificar" type="number" name="idAlmacen">
            <br><br>
            <label>Capacidad: </label>
            <input type="number" name="capacidadAlmacen">
            <br><br>
            <label>Direccion: </label>
            <input type="text" name="direccionAlmacen">
            <br><br>
            <button id="botonFormularioModificarAlmacenes" type="submit">Modificar</button>
        </form>
    </div>

    <br><br>

    <h3>Crear Articulo</h3>
    <div class="CrearArticulo">
        <form action='http://localhost:8001/api/v1/Backoffice/Articulos' method='post'>
            @csrf
            <label>Nombre: </label>
            <input type="text" name="nombreArticulo" required>
            <br><br>
            <label>Año Creacion: </label>
            <input type="number" name="anioCreacion" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>

    <br><br>

    <h3>Eliminar Articulo</h3>
    <div class="ArticuloAEliminar">    
        <form id="formularioEliminarArticulos" action='http://localhost:8001/api/v1/Almacenes/Articulos' method='post'>
            @method('DELETE')
            @csrf
            <label>Id Articulo: </label>
            <input id="inputFormularioEliminarArticulos" type="number" name="idArticulo" >
            <br><br>
            <button id="botonFormularioEliminarArticulos" type="submit">Eliminar Articulo</button>
        </form>
    </div>

    <br><br>
    <h3>Modificar Articulo</h3>
    <div>
        <form id="formularioModificarArticulos" action='http://localhost:8001/api/v1/Almacenes/Articulos' method='post'>
            @method('PUT')
            @csrf
            <label>Id Articulo: </label>
            <input id="inputFormularioModificarArticulos" type="number" name="idArticulo">
            <br><br>
            <label>Nombre: </label>
            <input type="text" name="nombreArticulo">
            <br><br>
            <button id="botonFormularioModificarArticulos" type="submit">Modificar</button>
        </form>
    </div>
    <script src="../js/almacenes.js"></script>
</body>
</html>