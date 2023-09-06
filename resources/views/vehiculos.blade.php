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
        <form action='api/v1/vehiculos/crear' method='post'>
            @csrf
            <label>matricula: </label>
            <input type="text" name="matricula" required>
            <br><br>
            <label>capacidad: </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>peso maximo: </label>
            <input type="number" name="pesoMaximo" required>
            <br><br>
            <label>modelo: </label>
            <input type="number" name="modelo" required>
            <br><br>
            <button type="submit">Crear</button>
            </form>
            </div>

            <br><br>
            <div class="VehiculoAModificar">
        <h3>Modificar Vehiculo:</h3>
        <form id="formularioModificarVehiculos" action='api/v1/vehiculos' method='post'>
            @method('PUT')
            @csrf
            <label>ID de Vehiculo: </label>
            <input id="inputFormularioModificarVehiculo" type="number" name="idVehiculo">
            <br><br>
            <label>Capacidad: </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Peso Maximo</label>
            <input type="number" name="pesoMaximo">
            <br><br>
            <button id="botonFormularioModificarVehiculos" type="submit"> Modificar</button>
        </form>
    </div>

    <br><br>
    <div class="VehiculoEliminar">
        <h3>Eliminar Vehiculo:</h3>
        <form id="formularioEliminarVehiculos" action='api/v1/vehiculos' method='post'>
            @method('DELETE')
            @csrf
            <label>ID de Vehiculo: </label>
            <input id="inputFormularioEliminarVehiculo" type="number" name="idVehiculo">
            <br><br>
            <button id="botonFormularioEliminarVehiculo" type="submit">Eliminar</button>
        </form>
    </div>
    <br><br>
    <div class="NuevoModelo">
        <h3>Crear Modelo:</h3>
        <form action='api/v1/modelo/crear' method='post'>
            @csrf
            <label>nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>anio: </label>
            <input type="number" name="anio" required>
            <br><br>
            <button type="submit">Crear</button>
            </form>
            </div>
        <br><br>

        <div class="ModeloEliminar">
        <h3>Eliminar Modelo:</h3>
        <form id="formularioEliminarModelo" action='api/v1/modelos' method='post'>
            @method('DELETE')
            @csrf
            <label>ID de Modelo: </label>
            <input id="inputFormularioEliminarModelo" type="number" name="idModelo">
            <br><br>
            <button id="botonFormularioEliminarModelo" type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>