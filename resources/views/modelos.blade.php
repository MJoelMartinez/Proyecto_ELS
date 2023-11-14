<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/modelos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Lista de Modelos de Vehículos</title>
</head>
<body>
<img id="ajusteBrillo" src="/img/BGNegro.png">
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

<div class="contenedorModelos">
        <div class="opcionesModelos">
            <img src="/img/iconoAgregar.png" class="cambioCursor" id="crearModelo">
            <label class="textoClaro"><b>|</b></label>
            <form action="api/v1/modelos/buscar" id="formularioBuscarModelo" method="post">
                <input class="roboto textoClaro" id="barraDeBusqueda" name="barraDeBusqueda" placeholder="Buscar Modelo">
                <div class="roboto textoClaro" id="contenedorFiltroDeBusqueda">
                    <label id="filtroBusqueda"><b>Filtro de Búsqueda:</b></label>
                    <select class="roboto textoClaro" id="filtroDeLista" name="filtroDeLista">
                        <option id="nombre" value="nombre"><b>Nombre</b></option>
                        <option id="idModelo" value="idModelo"><b>ID Modelo</b></option>
                        <option id="anio" value="anio"><b>Año</b></option>
                    <select>
                </div>
                <button type="submit" id="botonBuscar">
                    <img class="cambioCursor" id="imagenBotonBuscar" src="/img/iconoLupa.png">
                </button>
            </form>
        </div>
        <hr>
    </div>

<div class="contenedorCrearModelos roboto textoClaro" id="contenedorCrear">
<img class="cambioCursor" id="cerrarContenedorCrear" src="/img/iconoCerrar.png">
        <form action="api/v2/modelos" method="POST" id="formularioCrearModelos">
            @csrf
            <br>
            <label id="name">Nombre: </label>
            <input class="inputCrearModelo textoClaro roboto" type="text" name="nombre" required>
            <br><br>
            <label id="anioCreacion">Año de creación: </label>
            <input class="inputCrearModelo textoClaro roboto" type="number" name="anio" min="2000" max="9999" required>
            <br><br>
            <button class="botonCrearModelo roboto textoClaro cambioCursor" type="submit" id="anadirModelo">Añadir modelo</button>
        </form>
    </div>

    <div class="contenedor">
    <img src="/img/iconoEditar.png" class="cambioCursor" id="imagenBotonEditar" title="Editar Artículo">
    <img src="/img/iconoEliminar.png" class="cambioCursor" id="imagenBotonEliminar" title="Eliminar Artículo">
    </div>

    <div class="modeloAModificar roboto textoClaro" id="contenedorModificar">
    <img class="cambioCursor" id="cerrarContenedorModificar" src="/img/iconoCerrar.png">
        <form id="formularioModificarModelos" action="api/v2/modelos" method="POST">
            @method('PUT')
            @csrf
            <br>
            <label id="modeloID">ID Modelo:</label>
            <input class="inputModificarModelo textoClaro roboto" type="number" id="inputIDModeloModificar" name="idModelo" required>
            <br><br>
            <label id="labelNombre">Nombre:</label>
            <input class="inputModificarModelo textoClaro roboto" type="text" name="nombre" required>
            <br><br>
            <label id="creacionAnio">Año de creación: </label>
            <input class="inputModificarModelo textoClaro roboto" type="number" name="anio" min="2000" max="9999" required>
            <br><br>
            <button class="botonModificarModelo roboto textoClaro cambioCursor" id="botonFormularioModificarModelos" type="submit">Modificar modelo</button>
        </form>
    </div>

<div class="modeloAEliminar roboto textoClaro" id="contenedorEliminar">
<img class="cambioCursor" id="cerrarContenedorEliminar" src="/img/iconoCerrar.png">
        <form id="formularioEliminarModelos" action="api/v2/modelos" method="POST">
            @method('DELETE')
            @csrf
            <br>
            <label id="modID">ID Modelo:</label>
            <input class="inputEliminarModelo textoClaro roboto" type="number" id="inputIDModeloEliminar" name="idModelo" required>
            <br><br>
            <button class="botonEliminarModelo roboto textoClaro cambioCursor" id="botonFormularioEliminarModelos" type="submit">Eliminar modelo</button>
        </form>
    </div>
    <script type="module" src="../js/modelos.js"></script>
    <script type="module" src="/js/variables.js"></script>
</body>
</html>