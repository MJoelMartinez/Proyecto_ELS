<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="contenedorCrear">
        <h3>Registrar Tipo de Articulo:</h3>
        <form action='api/v2/tipoArticulo' method='POST'>
            @csrf
            <label>Tipo: </label>
            <input type="text" name="tipo" min="1" max="1" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>
</body>
</html>