<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/turnos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Turnos</title>
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

    {{--<div id="contenedorCrear">
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
    </div>--}}
    <script src="../js/turnos.js"></script>
</body>
</html>