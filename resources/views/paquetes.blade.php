<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.L.S - Paquetes</title>
    <link rel="icon" href="../img/Icon.png">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="articulos">
        <form action='/Almacenes/Paquetes/Crear' method='post'>
            @csrf
            <label>Cantidad de Artículos:</label>
            <input type="number" name="cantidadArticulos" required>
            <br><br>
            <button type="submit">Añadir</button>
        </form>
    </div>
    <div class="ModificarArticulos">
        <h3>Modificar:</h3>
        <form id="formularioAsignarPeso" action='http://localhost:8001/api/v1/Almacenes/Paquetes/Peso' method='post'>
            @method('PUT')
            @csrf
            <label>ID Paquete:</label>
            <input id="inputIDPaqueteAModificar" type="number" name="idPaquete">
            <br><br>
            <label>Peso:</label>
            <input type="number" name="peso" required>
            <br><br>
            <button id="botonFormularioAsignarPeso" type="submit">Modificar</button>
        </form>
    </div>
    <script src="../js/paquetes.js"></script>
</body>
</html>