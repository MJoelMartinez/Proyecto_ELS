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
<img id="ajusteBrillo" src="/img/BGNegro.png">
<header class="textoClaro">
    <a href="/"><img class="logo" src="/img/Logo del Sistema.png"></a>
    <nav>
    <ul class="menu">
        <li class="cambioCursor"><a href="/">HOME</a></li>
        <li><a href="/html/opcionesHeader/acercaDe.html" id="acercaDe">ACERCA DE</a></li>
        <li class="cambioCursor"><a href="/html/opcionesHeader/contacto.html" id="contacto">CONTACTO</a></li>
        <li><div class="boton textoClaro cambioCursor divEnHeader" id="idiomaDelSistema"></div></li>
        <li><div class="boton textoClaro cambioCursor divEnHeader" id="aparienciaDelSistema"></div></li>
        <li>
        <div id="contenedorUsuario">
            <img class="usuario" id="iconoUsuario" src="/img/iconoUsuario.png">
            <button class="boton textoClaro">NOMBRE DEL USUARIO</button>
            <ul class="submenu">
            <li><img class="salir" id="iconoSalida" src="/img/iconoSalir.png">
                <a href="/html/login.html" id="cerrarSesion">CERRAR SESIÓN</a></li>
            </ul>
        </div>
        </li>
    </ul>
    </nav>
</header>

  <div class="contenedor">
    <button class="botones roboto textoClaro" id="crearTurno"><img class="botonTurno" src="/img/iconoAgregar.png" title="Crear Turno"></button>
    <button class="botones roboto textoClaro" id="eliminarTurno"><img class="botonTurno" src="/img/iconoEliminar.png" title="Eliminar Turno"></button>
  </div>

<div class="contenedorCrearTurnos roboto textoClaro" id="contenedorCrear">
<img class="cambioCursor" id="cerrarContenedorCrear" src="/img/iconoCerrar.png">
        <form action='api/v2/turnos' method='POST' id="formularioCrearTurno">
            @csrf
            <br>
            <label id="horaInicio">Hora de inicio: </label>
            <input class="inputCrearTurno textoClaro roboto" type="time" name="horaInicio" required>
            <br><br>
            <label id="horaFinal">Hora de finalización: </label>
            <input class="inputCrearTurno textoClaro roboto" type="time" name="horaFinal" required>
            <br><br>
            <button class="botonCrearTurno roboto textoClaro cambioCursor" type="submit" id="crear">Crear</button>
        </form>
    </div>

    <div class="contenedorEliminarTurnos roboto textoClaro" id="contenedorEliminar">
    <img class="cambioCursor" id="cerrarContenedorEliminar" src="/img/iconoCerrar.png">
        <form id="formularioEliminarTurnos" action='api/v2/turnos' method='POST'>
            @method('DELETE')
            @csrf
            <br>
            <label id="idTurno">ID Turno: </label>
            <input class="inputEliminarTurno textoClaro roboto" id="inputIDTurnoEliminar" type="number" name="idTurno" required>
            <br><br>
            <button class="botonEliminarTurno roboto textoClaro cambioCursor" id="botonFormularioEliminarTurnos" type="submit">Eliminar</button>
        </form>
    </div>
    <script type="module" src="../js/turnos.js"></script>
    <script type="module" src="/js/variables.js"></script>
</body>
</html>