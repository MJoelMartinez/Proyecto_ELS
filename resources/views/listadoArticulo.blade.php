<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/listadoArticulo.css">
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
  <div class="contenedorAccesoAListas">
        <a href="/articulos" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonArticulo">
            <label class="cambioCursor" id="labelAOrdenar"><b>Artículo</b></label>
            <img class="iconoBotonListado" id="iconoArticulos" src="/img/iconoArticulos.png">
          </div>
        </a>
        <a href="/tipoArticulo" class="botonListado">
          <div class="cambioCursor textoClaro" id="botonTipoArticulo">
            <label class="cambioCursor" id="labelAOrdenar"><b>Tipo Artículo</b></label>
            <img class="iconoBotonListado" id="iconoTipoArticulo" src="/img/iconoTipoArticulo.png">
          </div>
        </a>
    </div>
    <footer class="footerBackOffice textoClaro absoluto">
      <div id="contenedorUbicacionBackOffice">
        <img id="imagenUbicacionBackOffice" src="/img/iconoSeguimiento.png">
        BackOffice
      </div>
    </footer>
    <script src="/js/listadoArticulo.js"></script>
</body>
</html>