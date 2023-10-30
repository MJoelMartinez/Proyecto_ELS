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

<div class="contenedorModelos">
        <div class="opcionesModelos">
            <img src="/img/iconoAgregar.png" class="cambioCursor" id="crearModelo">
            <label class="textoClaro"><b>|</b></label>
            <form action="api/v1/modelos/buscar" id="formularioBuscarModelo" method="post">
                <input class="roboto textoClaro" id="barraDeBusqueda" name="barraDeBusqueda" placeholder="Buscar Modelo">
                <div class="roboto textoClaro" id="contenedorFiltroDeBusqueda">
                    <label><b>Filtro de Búsqueda:</b></label>
                    <select class="roboto textoClaro" id="filtroDeLista" name="filtroDeLista">
                        <option value="nombre"><b>Nombre</b></option>
                        <option value="idModelo"><b>ID Modelo</b></option>
                        <option value="anio"><b>Año</b></option>
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
            <label>Nombre: </label>
            <input class="inputCrearModelo textoClaro roboto" type="text" name="nombre" required>
            <br><br>
            <label>Año de creación: </label>
            <input class="inputCrearModelo textoClaro roboto" type="number" name="anio" min="2000" max="9999" required>
            <br><br>
            <button class="botonCrearModelo roboto textoClaro cambioCursor" type="submit">Añadir modelo</button>
        </form>
    </div>

    {{--<div id="contenedorModificar">
        <form id="formularioModificarModelos" action="api/v2/modelos" method="POST">
            @method('PUT')
            @csrf
            <label>ID Modelo:<label>
            <input type="number" id="inputIDModeloModificar" name="idModelo" required>
            <br><br>
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Año de creación: </label>
            <input type="number" name="anio" min="2000" max="9999" required>
            <br><br>
            <button id="botonFormularioModificarModelos" type="submit">Modificar modelo</button>
        </form>
    </div>
    <div id="contenedorEliminar">
        <form id="formularioEliminarModelos" action="api/v2/modelos" method="POST">
            @method('DELETE')
            @csrf
            <label>ID Modelo:<label>
            <input type="number" id="inputIDModeloEliminar" name="idModelo" required>
            <br><br>
            <button id="botonFormularioEliminarModelos" type="submit">Eliminar modelo</button>
        </form>
    </div>--}}
    <script src="../js/modelos.js"></script>
</body>
</html>