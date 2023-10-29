<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/appBackOffice.css">
    <link rel="stylesheet" href="/css/almacenes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Backoffice</title>
</head>
<body>
    <img id="ajusteBrillo" src="/img/BGNegro.png">
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
        <h3>Crear Almacén:</h3>
        <form action='api/v2/almacenes' method='POST'>
            @csrf
            <label>Direccion: </label>
            <input type="text" name="direccion" min="2" max="40" required>
            <br><br>
            <label>Capacidad (m3): </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <label>Departamento: </label>
            <input type="number" name="idDepartamento" required>
            <br><br>
            <button type="submit">Crear</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorModificar">
        <h3>Modificar Almacén:</h3>
        <form id="formularioModificarAlmacenes" action='api/v2/almacenes' method='POST'>
            @method('PUT')
            @csrf
            <label>ID del Almacén: </label>
            <input id="inputIDAlmacenModificar" type="number" name="idAlmacen" required>
            <br><br>
            <label>Direccion: </label>
            <input type="text" name="direccion" min="2" max="40" required>
            <br><br>
            <label>Capacidad (m3): </label>
            <input type="number" name="capacidad" required>
            <br><br>
            <button id="botonFormularioModificarAlmacenes" type="submit">Modificar</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorEliminar">
        <h3>Eliminar Almacén:</h3>
        <form id="formularioEliminarAlmacenes" action='api/v2/almacenes' method='POST'>
            @method('DELETE')
            @csrf
            <label>ID del Almacén: </label>
            <input id="inputIDAlmacenEliminar" type="number" name="idAlmacen" required>
            <br><br>
            <button id="botonFormularioEliminarAlmacenes" type="submit">Eliminar</button>
        </form>
    </div>--}}
    <script src="../js/almacenes.js"></script>
</body>
</html>