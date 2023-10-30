<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/vehiculos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Vehiculos</title>
</head>
<body>
    <header class="textoClaro">
    <a href="/"><img class="logo" src="/img/Logo del Sistema.png"></a>
    <nav>
      <ul class="menu">
        <li class="cambioCursor"><a href="/">HOME</a></li>
        <li><a href="/html/opcionesHeader/acercaDe.html">ACERCA DE</a></li>
        <li class="cambioCursor"><a href="/html/opcionesHeader/contacto.html">CONTACTO</a></li>
        <li><div class="boton textoClaro cambioCursor divEnHeader" id="idiomaDelSistema"></div></li>
        <li><div class="boton textoClaro cambioCursor divEnHeader" id="aparienciaDelSistema"></div></li>
        <li>
          <div id="contenedorUsuario">
            <img class="usuario" id="iconoUsuario" src="/img/iconoUsuario.png">
            <button class="boton textoClaro">NOMBRE DEL USUARIO</button>
            <ul class="submenu">
              <li><img class="salir" id="iconoSalida" src="/img/iconoSalir.png">
                <a href="/html/login.html">CERRAR SESIÓN</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </header>

    {{--<div class="VehiculoAModificar">
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
    </div>--}}
    <script src="../js/vehiculos.js"></script>
</body>
</html>