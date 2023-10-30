<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/appBackOffice.css">
    <link rel="stylesheet" href="/css/articulos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Articulos</title>
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
  <div class="contenedorArticulos">
        <div class="opcionesArticulos">
            <img src="/img/iconoAgregar.png" class="cambioCursor" id="crearArticulo">
            <label class="textoClaro"><b>|</b></label>
            <form action="api/v1/articulos/buscar" id="formularioBuscarArticulo" method="post">
                <input class="roboto textoClaro" id="barraDeBusqueda" name="barraDeBusqueda" placeholder="Buscar Artículo">
                <div class="roboto textoClaro" id="contenedorFiltroDeBusqueda">
                    <label><b>Filtro de Búsqueda:</b></label>
                    <select class="roboto textoClaro" id="filtroDeLista" name="filtroDeLista">
                        <option value="idArticulo"><b>ID Artículo</b></option>
                        <option value="idTipo"><b>ID Tipo</b></option>
                    <select>
                </div>
                <button type="submit" id="botonBuscar">
                    <img class="cambioCursor" id="imagenBotonBuscar" src="/img/iconoLupa.png">
                </button>
            </form>
        </div>
        <hr>
    </div>

    <div class="contenedorCrearArticulo roboto textoClaro" id="contenedorCrear">
    <img class="cambioCursor" id="cerrarContenedorCrear" src="/img/iconoCerrar.png">
        <form action='api/v2/articulos' method='POST' id="formularioCrearArticulo">
            @csrf
            <br>
            <label>Nombre: </label>
            <input class="inputCrearArticulo textoClaro roboto" type="text" name="nombre" required>
            <br><br>
            <label>Año de creación: </label>
            <input class="inputCrearArticulo textoClaro roboto" type="number" name="anioCreacion" min="2000" max="9999" required>
            <br><br>
            <label>Tipo de Artículo: </label>
            <input class="inputCrearArticulo textoClaro roboto" type="text" name="tipo" min="1" max="1" required>
            <br><br>
            <button class="botonCrearArticulo roboto textoClaro cambioCursor" type="submit">Crear</button>
        </form>
    </div>

    {{--<div id="contenedorModificar">
        <h3>Modificar Articulo:</h3>
        <form id="formularioModificarArticulos" action='api/v2/articulos' method='POST'>
            @method('PUT')
            @csrf
            <label>ID del artículo: </label>
            <input id="inputIDArticuloModificar" type="number" name="idArticulo" required>
            <br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <button id="botonFormularioModificarArticulos" type="submit">Modificar</button>
        </form>
    </div>
    <br><br>
    <div id="contenedorEliminar">
        <h3>Eliminar Articulo:</h3>
        <form id="formularioEliminarArticulos" action='api/v2/articulos' method='POST'>
            @method('DELETE')
            @csrf
            <label>ID del artículo: </label>
            <input id="inputIDArticuloEliminar" type="number" name="idArticulo" required>
            <br><br>
            <button id="botonFormularioEliminarArticulos" type="submit">Eliminar</button>
        </form>
    </div>--}}
    <script src="../js/articulos.js"></script>
</body>
</html>