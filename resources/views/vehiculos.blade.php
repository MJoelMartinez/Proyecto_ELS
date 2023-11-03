<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.L.S - Vehiculos</title>
</head>
<body>
    <div class="NuevoVehiculo">
        <h3>Crear Vehiculo:</h3>
        <form action='api/v2/vehiculos' method='post'>
            @csrf
            <label>ID Modelo: </label>
            <input type="number" name="modelo" required>
            <br><br>
            <label>Matricula: </label>
            <input type="text" name="matricula" required>
            <br><br>
            <label>Capacidad: </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Peso maximo (KG): </label>
            <input type="number" name="pesoMaximo" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>
    <br><br>
    <div class="VehiculoAModificar">
        <h3>Modificar Vehiculo:</h3>
        <form id="formularioModificarVehiculos" action='api/v2/vehiculos' method='post'>
            @method('PUT')
            @csrf
            <label>Matrícula: </label>
            <input id="inputMatriculaModificar" type="text" name="matricula" required>
            <br><br>
            <label>Capacidad: </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Peso Maximo</label>
            <input type="number" name="pesoMaximo" required>
            <br><br>
            <button id="botonFormularioModificarVehiculos" type="submit">Modificar</button>
        </form>
    </div>
    <br><br>
    <div class="VehiculoEliminar">
        <h3>Eliminar Vehiculo:</h3>
        <form id="formularioEliminarVehiculos" action='api/v2/vehiculos' method='post'>
            @method('DELETE')
            @csrf
            <label>Matrícula: </label>
            <input id="inputMatriculaEliminar" type="text" name="matricula" required>
            <br><br>
            <button id="botonFormularioEliminarVehiculos" type="submit">Eliminar</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorAsignarChofer">
        <h3>Asignar Chofer:</h3>
        <form id="formularioAsignarChofer" action="api/v2/asignarVehiculo" method="POST">
            @method('PUT')
            @csrf
            <label>CI del Chofer: </label>
            <input id="inputCIAsignar" type="number" name="documentoDeIdentidad" required>
            <br><br>
            <label>Matricula del Vehiculo: </label>
            <input type="text" name="matricula" required>
            <br><br>
            <button id="botonAsignarChofer" type="submit">Asignar Chofer</button>
        </form>
    </div>
    <div id="contenedorRelegarChofer">
        <h3>Relegar Chofer:</h3>
        <form id="formularioRelegarChofer" action="api/v2/relegarVehiculo" method="POST">
            @method('DELETE')
            @csrf
            <label>CI del Chofer: </label>
            <input id="inputCIRelegar" type="number" name="documentoDeIdentidad" required>
            <br><br>
            <button id="botonRelegarChofer" type="submit">Relegar Chofer</button>
        </form>
    </div>
    <script src="../js/vehiculos.js"></script>
</body>
</html>