<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/appBackOffice.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Backoffice</title>
</head>
<body>
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

  <div class="contenedorAccesoAListas">
        <a href="/usuarios" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonListaUsuarios">
            <label class="cambioCursor" id="listaUsuarios"><b>Lista de Usuarios</b></label>
            <img class="iconoBotonListado" id="iconoListadoUsuarios" src="/img/iconoUsuarios.png">
          </div>
        </a>
        <a href="/almacenes" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonListaAlmacenes">
            <label class="cambioCursor" id="listaAlmacenes"><b>Lista de Almacenes</b></label>
            <img class="iconoBotonListado" id="iconoListadoPaquetes" src="/img/iconoAlmacenes.png">
          </div>
        </a>
        <a href="/listadoVehiculo" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonListaVehiculos">
            <label class="cambioCursor" id="listaVehiculos"><b>Lista de Vehículos</b></label>
            <img class="iconoBotonListado" id="iconoListadoVehiculo" src="/img/iconoCamion.png">
          </div>
        </a>
        <a href="/listadoArticulo" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonListaArticulos">
            <label class="cambioCursor" id="listaArticulos"><b>Lista de Artículos</b></label>
            <img class="iconoBotonListado" id="iconoListadoArticulos" src="/img/iconoArticulo.png">
          </div>
        </a>

        <a href="/turnos" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonListaTurnos">
            <label class="cambioCursor" id="turnos"><b>Turnos</b></label>
            <img class="iconoBotonListado" id="iconoListadoTurnos" src="/img/iconoTurno.png">
          </div>
        </a>
    </div>
    <footer class="footerBackOffice textoClaro absoluto">
      <div id="contenedorUbicacionBackOffice">
        <img id="imagenUbicacionBackOffice" src="/img/iconoSeguimiento.png">
        BackOffice
      </div>
    </footer>
    <script type="module" src="/js/aplicacionBackOffice.js"></script>
    <script type="module" src="/js/variables.js"></script>
</body>
</html>