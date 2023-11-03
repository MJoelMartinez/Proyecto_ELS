<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="contenedorCrear">
        <h3>Crear Articulo:</h3>
        <form action='api/v2/articulos' method='POST'>
            @csrf
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Año de creación: </label>
            <input type="number" name="anioCreacion" min="2000" max="9999" required>
            <br><br>
            <label>Tipo de Artículo: </label>
            <input type="text" name="tipo" min="1" max="1" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorModificar">
        <h3>Modificar Articulo:</h3>
        <form id="formularioModificarArticulos" action='api/v2/articulos' method='POST'>
            @method('PUT')
            @csrf
            <label>ID del artículo: </label>
            <input id="inputIDArticuloModificar" type="number" name="idArticulo" required>
            <br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <button id="botonFormularioModificarArticulos" type="submit">Modificar</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorEliminar">
        <h3>Eliminar Articulo:</h3>
        <form id="formularioEliminarArticulos" action='api/v2/articulos' method='POST'>
            @method('DELETE')
            @csrf
            <label>ID del artículo: </label>
            <input id="inputIDArticuloEliminar" type="number" name="idArticulo" required>
            <br><br>
            <button id="botonFormularioEliminarArticulos" type="submit">Eliminar</button>
        </form>
    </div>
    <script src="../js/articulos.js"></script>
</body>
</html>