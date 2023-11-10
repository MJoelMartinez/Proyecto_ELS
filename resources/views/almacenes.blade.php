<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/almacenes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Almacenes</title>
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

<div class="contenedorAlmacenes roboto textoClaro">
        <div class="opcionesAlmacen">
            <img src="/img/iconoAgregar.png" class="cambioCursor" id="crearAlmacen">
            <label class="textoClaro"><b>|</b></label>
            <form action="api/v1/almacenes/buscar" id="formularioBuscarAlmacenes" method="post">
                <input class="roboto textoClaro" id="barraDeBusqueda" name="barraDeBusqueda" placeholder="Buscar Almacén">
                <div class="roboto textoClaro" id="contenedorFiltroDeBusqueda">
                    <label id="filtroBusqueda"><b>Filtro de Búsqueda:</b></label>
                    <select class="roboto textoClaro" id="filtroDeLista" name="filtroDeLista">
                        <option id="idAlmacen" value="idAlmacen"><b>ID Almacén</b></option>
                        <option id="departamento" value="departamento"><b>Departamento</b></option>
                        <option id="direccion" value="direccion"><b>Dirección</b></option>
                    <select>
                </div>
                <button type="submit" id="botonBuscar">
                    <img class="cambioCursor" id="imagenBotonBuscar" src="/img/iconoLupa.png">
                </button>
            </form>
        </div>
        <hr>
    </div>

    <div class="contenedorCrearAlmacenes roboto textoClaro" id="contenedorCrear">
    <img class="cambioCursor" id="cerrarContenedorCrear" src="/img/iconoCerrar.png">
        <form action='api/v2/almacenes' method='POST' id="formularioCrearAlmacenes">
            @csrf
            <br>
            <label id="dire">Direccion: </label>
            <input class="inputCrearAlmacen textoClaro roboto" type="text" name="direccion" min="2" max="40" required>
            <br><br>
            <label id="capacidad">Capacidad (m³): </label>
            <input class="inputCrearAlmacen textoClaro roboto" type="number" name="capacidad" required>
            <br><br>
            <label id="depar">Departamento: </label>
            <input class="inputCrearAlmacen textoClaro roboto" type="number" name="idDepartamento" required>
            <br><br>
            <button class="botonCrearAlmacen roboto textoClaro cambioCursor" id="botonCrearAlmacen" type="submit">Crear</button>
        </form>
    </div>

    <div class="contenedor">
    <img src="/img/iconoEditar.png" class="cambioCursor" id="imagenBotonEditar" title="Editar Almacén">
    <img src="/img/iconoEliminar.png" class="cambioCursor" id="imagenBotonEliminar" title="Eliminar Almacén">
    </div>

    <div class="AlmacenAModificar roboto textoClaro" id="contenedorModificar">
    <img class="cambioCursor" id="cerrarContenedorModificar" src="/img/iconoCerrar.png">
        <form id="formularioModificarAlmacenes" action='api/v2/almacenes' method='POST'>
            @method('PUT')
            @csrf
            <br>
            <label id="almacenID">ID del Almacén: </label>
            <input class="inputModificarAlmacen textoClaro roboto" id="inputIDAlmacenModificar" type="number" name="idAlmacen" required>
            <br><br>
            <label id="di">Direccion: </label>
            <input class="inputModificarAlmacen textoClaro roboto" type="text" name="direccion" min="2" max="40" required>
            <br><br>
            <label id="capa">Capacidad (m³): </label>
            <input class="inputModificarAlmacen textoClaro roboto" type="number" name="capacidad" required>
            <br><br>
            <button class="botonModificarAlmacen roboto textoClaro cambioCursor" id="botonFormularioModificarAlmacenes" type="submit">Modificar</button>
        </form>
    </div>

    <div class="AlmacenAEliminar roboto textoClaro" id="contenedorEliminar">
    <img class="cambioCursor" id="cerrarContenedorEliminar" src="/img/iconoCerrar.png">
        <form id="formularioEliminarAlmacenes" action='api/v2/almacenes' method='POST'>
            @method('DELETE')
            @csrf
            <br>
            <label id="almaID">ID del Almacén: </label>
            <input class="inputEliminarAlmacen textoClaro roboto" id="inputIDAlmacenEliminar" type="number" name="idAlmacen" required>
            <br><br>
            <button class="botonEliminarAlmacen roboto textoClaro cambioCursor" id="botonFormularioEliminarAlmacenes" type="submit">Eliminar</button>
        </form>
    </div>
    <script type="module" src="../js/almacenes.js"></script>
    <script type="module" src="/js/variables.js"></script>
</body>
</html>