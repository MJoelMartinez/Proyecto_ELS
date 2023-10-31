<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.L.S - Turnos</title>
</head>
<body>
    <div id="contenedorCrear">
        <h3>Crear Turno:</h3>
        <form action='api/v2/turnos' method='POST'>
            @csrf
            <label>Hora de inicio: </label>
            <input type="time" name="horaInicio" required>
            <br><br>
            <label>Hora de finalización: </label>
            <input type="time" name="horaFinal" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorEliminar">
        <h3>Eliminar Turno:</h3>
        <form id="formularioEliminarTurnos" action='api/v2/turnos' method='POST'>
            @method('DELETE')
            @csrf
            <label>ID Turno: </label>
            <input id="inputIDTurnoEliminar" type="number" name="idTurno" required>
            <br><br>
            <button id="botonFormularioEliminarTurnos" type="submit">Eliminar</button>
        </form>
    </div>
    <script src="../js/turnos.js"></script>
</body>
</html>