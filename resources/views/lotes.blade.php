<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.L.S - Lotes</title>
    <link rel="icon" href="../img/Icon.png">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="lotes">
        <h3>Crear Lote:</h3>
        <form action='http://localhost:8001/api/v1/Almacenes/Lotes' method='post'>
            @csrf
            <label>ID Paquetes:</label>
            <input type="number" name="idPaquete" required>
            <br><br>
            <label>Cantidad de Paquetes:</label>
            <input type="number" name="cantidadPaquetes" required>
            <br><br>
            <button type="submit">Añadir</button>
        </form>
    </div>
</body>
</html>