<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/usuarios.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="/img/iconoPestana.png">
    <title>E.L.S - Usuarios</title>
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
  <div class="contenedorUsuarios">
        <div class="opcionesUsuarios">
            <img src="/img/iconoAgregar.png" class="cambioCursor" id="crearUsuario">
            <label class="textoClaro"><b>|</b></label>
            <form action="api/v1/usuarios/buscar" id="formularioBuscarUsuarios" method="post">
                <input class="roboto textoClaro" id="barraDeBusqueda" name="barraDeBusqueda" placeholder="Buscar Usuario">
                <div class="roboto textoClaro" id="contenedorFiltroDeBusqueda">
                    <label id="filtroBusqueda"><b>Filtro de Búsqueda:</b></label>
                    <select class="roboto textoClaro" id="filtroDeLista" name="filtroDeLista">
                        <option value="usuariosExistentes" id="usuariosExistentes"><b>Usuarios Existentes</b></option>
                        <option value="usuariosEliminados" id="usuariosEliminados"><b>Usuarios Eliminados</b></option>
                        <option value="todosLosUsuarios" id="todosLosUsuarios"><b>Usuarios Existentes y Eliminados</b></option>
                    <select>
                </div>
                <button type="submit" id="botonBuscar">
                    <img class="cambioCursor" id="imagenBotonBuscar" src="/img/iconoLupa.png">
                </button>
            </form>
        </div>
        <hr>
    </div>

    <div class="contenedorCrearUsuarios roboto textoClaro">
        <img class="cambioCursor" id="cerrarContenedorCrear" src="/img/iconoCerrar.png">
        <form action="api/v2/usuarios" method="post" id="formularioCrearUsuarios">
            @csrf
            <br>
            <label id="documento"><b>Documento de Identidad: </b></label>
            <input type="number" name="documentoDeIdentidad" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="contrasenia"><b>Contraseña: </b></label>
            <input type="password" name="contrasenia" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="repetirContrasenia"><b>Repetir Contraseña: </b></label>
            <input type="password" name="contrasenia_confirmation" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="nombre"><b>Nombre: </b></label>
            <input type="text" name="nombre" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="apellido"><b>Apellido: </b></label>
            <input type="text" name="apellido" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="telefono"><b>Teléfono: </b></label>
            <input type="number" name="telefono" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="email"><b>Correo Electrónico: </b></label>
            <input type="email" name="email" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="direccion"><b>Dirección: </b></label>
            <input type="text" name="direccion" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label id="rol">Rol:</label>
            <select class="roboto textoClaro" id="rolDeLaEmpresa" name="rolDeLaEmpresa">
                <option value="usuarioComun" id="usuarioComun">Usuario Común</option>
                <option value="administrador" id="administrador">Administrador</option>
                <option value="gerente" id="gerente">Gerente</option>
                <option value="cargador" id="cargador">Cargador</option>
                <option value="chofer" id="chofer">Chofer</option>
            </select>
            <br><br>
            <div id="divGerente">
            <label class="labelCarnet" id="labelCarnetGerenteIDAlmacen">ID Almacén: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idAlmacen">
            <br><br>
            <label class="labelCarnet" id="labelCarnetGerenteIDTurno">ID Turno: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idTurno">
            </div>
            <div id="divCarnetCargador">
            <label class="labelCarnet" id="labelCarnetCargadorIDAlmacen">ID Almacén: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idAlmacen">
            <br><br>
            <label class="labelCarnet" id="labelCarnetCargadorIDTurno">ID Turno: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idTurno">
            <br><br>
                <label class="rol" id="labelCarnetCargadorTransporte">ID Carnet de Transporte: </label>
                <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="carnetTransporte">
            </div>
            <div class="contenedorInformacionChofer" id="divChofer">
                <label id="idLicencia">ID de Licencia: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="text" name="idLicencia" min="8" max="8">
                <br><br>
                <label id="validoDesde">Valido Desde: </label>
                <br><br>
                <label id="dia">Día: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="diaDesde" min="1" max="31">
                <label id="mes">Mes: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="mesDesde" min="1" max="12">
                <label id="anio">Año: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="anioDesde" min="1960" max="2007">
                <br><br>
                <label id="validoHasta">Valido Hasta: </label>
                <br><br>
                <label id="diaHasta">Día: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="diaHasta" min="1" max="31">
                <label id="mesHasta">Mes: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="mesHasta" min="1" max="12">
                <label id="anioHasta">Año: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="anioHasta" min="2024" max="9999">
            </div>

            <button type="submit" class="botonCrearUsuario roboto textoClaro cambioCursor" id="botonCrearUsuario"><b>Añadir</b></button>
        </form>
    </div>

    <div class="contenedor">
    <img src="/img/iconoEditar.png" class="cambioCursor" id="imagenBotonEditar" title="Editar Usuario">
    <img src="/img/iconoEliminar.png" class="cambioCursor" id="imagenBotonEliminar" title="Eliminar Usuario">
    </div>

    <div class="UsuarioAModificar roboto textoClaro">
    <img class="cambioCursor" id="cerrarContenedorModificar" src="/img/iconoCerrar.png">
        <form id="formularioModificarUsuarios" action='api/v2/usuarios' method='post'>
            @method('PUT')
            @csrf
            <br>
            <label id="idIdentidad">Documento de Identidad: </label>
            <input id="inputFormularioModificar" class="inputModificarUsuario textoClaro roboto" type="number" name="documentoDeIdentidad">
            <br><br>
            <label id="nom">Nombre: </label>
            <input type="text" class="inputModificarUsuario textoClaro roboto" name="nombre" required>
            <br><br>
            <label id="tel">Teléfono: </label>
            <input type="number" class="inputModificarUsuario textoClaro roboto" name="telefono" required>
            <br><br>
            <label id="dire">Dirección: </label>
            <input type="text" class="inputModificarUsuario textoClaro roboto" name="direccion" required>
            <br><br>
            <button id="botonFormularioModificarUsuarios" class="botonModificarUsuario roboto textoClaro cambioCursor" type="submit">Modificar</button>
        </form>
    </div>
    <div class="UsuarioAEliminar roboto textoClaro">
    <img class="cambioCursor" id="cerrarContenedorEliminar" src="/img/iconoCerrar.png">
        <form id="formularioEliminarUsuarios" action='api/v2/usuarios' method='post'>
            @method('DELETE')
            @csrf
            <br>
            <label id="identidadID">Documento de Identidad: </label>
            <input id="inputFormularioEliminar" class="inputEliminarUsuario textoClaro roboto" type="number" name="documentoDeIdentidad">
            <br><br>
            <button id="botonFormularioEliminarUsuarios" class="botonEliminarUsuario roboto textoClaro cambioCursor" type="submit">Eliminar</button>
        </form>
    </div>
    <script type="module" src="../js/usuarios.js"></script>
    <script type="module" src="/js/variables.js"></script>
</body>
</html>