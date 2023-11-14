<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/tipoArticulo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Tipo de Articulo</title>
</head>
<body>
<header class="textoClaro">
    <a href="/"><img class="logo" src="/img/Logo del Sistema.png"></a>
    <nav>
    <div class="menu-icon" onclick="menu()">
            <img src="/img/iconoMenu.png" alt="Menú">
        </div>
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
    <script>
      function menu() {
      var menu = document.querySelector('nav ul');
      menu.classList.toggle('active');
}
    </script>
  </header>

    <div class="contenedorTipoArticulo" id="contenedorCrear">
        <h3 id="registrar">Registrar Tipo de Articulo:</h3>
        <form action='api/v2/tipoArticulo' method='POST'>
            @csrf
            <label id="tipo">Tipo: </label>
            <input type="text" name="tipo" min="1" max="1" required>
            <br><br>
            <button type="submit" id="crear">Crear</button>
        </form>
    </div>
    <script type="module" src="../js/tipoArticulo.js"></script>
    <script type="module" src="/js/variables.js"></script>
</body>
</html>