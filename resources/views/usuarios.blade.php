<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Script TriByte">
    <link rel="stylesheet" href="/css/headerStyle.css">
    <link rel="stylesheet" href="/css/clasesGlobales.css">
    <link rel="stylesheet" href="/css/appBackOffice.css">
    <link rel="stylesheet" href="/css/usuarios.css">
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
  <div class="contenedorUsuarios">
        <div class="opcionesUsuarios">
            <img src="/img/iconoAgregar.png" class="cambioCursor" id="crearUsuario">
            <label class="textoClaro"><b>|</b></label>
            <form action="api/v1/usuarios/buscar" id="formularioBuscarUsuarios" method="post">
                <input class="roboto textoClaro" id="barraDeBusqueda" name="barraDeBusqueda" placeholder="Buscar Usuario">
                <div class="roboto textoClaro" id="contenedorFiltroDeBusqueda">
                    <label><b>Filtro de Búsqueda:</b></label>
                    <select class="roboto textoClaro" id="filtroDeLista" name="filtroDeLista">
                        <option value="usuariosExistentes"><b>Usuarios Existentes</b></option>
                        <option value="usuariosEliminados"><b>Usuarios Eliminados</b></option>
                        <option value="todosLosUsuarios"><b>Usuarios Existentes y Eliminados</b></option>
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
            <label><b>Documento de Identidad: </b></label>
            <input type="number" name="documentoDeIdentidad" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Contraseña: </b></label>
            <input type="password" name="contrasenia" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Repetir Contraseña: </b></label>
            <input type="password" name="contrasenia_confirmation" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Nombre: </b></label>
            <input type="text" name="nombre" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Apellido: </b></label>
            <input type="text" name="apellido" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Teléfono: </b></label>
            <input type="number" name="telefono" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Correo Electrónico: </b></label>
            <input type="email" name="email" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label><b>Dirección: </b></label>
            <input type="text" name="direccion" class="inputCrearUsuario textoClaro roboto" required>
            <br><br>
            <label>Rol:</label>
            <select class="roboto textoClaro" id="rolDeLaEmpresa" name="rolDeLaEmpresa">
                <option value="usuarioComun">Usuario Común</option>
                <option value="administrador">Administrador</option>
                <option value="gerente">Gerente</option>
                <option value="cargador">Cargador</option>
                <option value="chofer">Chofer</option>
            </select>
            <br><br>
            <div id="divGerente">
            <label id="labelCarnetCargador">ID Almacén: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idAlmacen">
            <br><br>
            <label id="labelCarnetCargador">ID Turno: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idTurno">
            </div>
            <div id="divCarnetCargador">
            <label id="labelCarnetCargador">ID Almacén: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idAlmacen">
            <br><br>
            <label id="labelCarnetCargador">ID Turno: </label>
            <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="idTurno">
            <br><br>
                <label class="rol" id="labelCarnetCargador">ID Carnet de Transporte: </label>
                <input class="inputCrearUsuario textoClaro roboto" id="inputCarnetCargador" type="number" name="carnetTransporte">
            </div>
            <div class="contenedorInformacionChofer" id="divChofer">
                <label>ID de Licencia: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="text" name="idLicencia" min="8" max="8">
                <br><br>
                <label>Valido Desde: </label>
                <br><br>
                <label>Dia: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="diaDesde" min="1" max="31">
                <label>Mes: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="mesDesde" min="1" max="12">
                <label>Año: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="anioDesde" min="1960" max="2007">
                <br><br>
                <label>Valido Hasta: </label>
                <br><br>
                <label>Dia: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="diaHasta" min="1" max="31">
                <label>Mes: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="mesHasta" min="1" max="12">
                <label>Año: </label>
                <input class="inputCrearUsuario textoClaro roboto" type="number" name="anioHasta" min="2024" max="9999">
            </div>

            <button type="submit" class="botonCrearUsuario roboto textoClaro cambioCursor" id="botonCrearUsuario"><b>Añadir</b></button>
        </form>
    </div>

   {{--
    <div class="UsuarioAModificar">
        <h3>Modificar Usuario:</h3>
        <form id="formularioModificarUsuarios" action='api/v2/usuarios' method='post'>
            @method('PUT')
            @csrf
            <label>Documento de Identidad: </label>
            <input id="inputFormularioModificar" type="number" name="documentoDeIdentidad">
            <br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Teléfono: </label>
            <input type="number" name="telefono" required>
            <br><br>
            <label>Dirección: </label>
            <input type="text" name="direccion" required>
            <br><br>
            <button id="botonFormularioModificarUsuarios" type="submit">Modificar</button>
        </form>
    </div>
    <br><br>
    <div class="UsuarioAEliminar">
        <h3>Eliminar Usuario:</h3>
        <form id="formularioEliminarUsuarios" action='api/v2/usuarios' method='post'>
            @method('DELETE')
            @csrf
            <label>Documento de Identidad: </label>
            <input id="inputFormularioEliminar" type="number" name="documentoDeIdentidad">
            <br><br>
            <button id="botonFormularioEliminarUsuarios" type="submit">Eliminar</button>
        </form>
    </div> --}}
    <script src="../js/usuarios.js"></script>
</body>
</html>