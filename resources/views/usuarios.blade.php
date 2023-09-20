<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/Icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>E.L.S - Usuarios</title>
</head>
<body>
    <div class="ContenedorBusqueda">
        <form action='api/v1/usuarios/buscar' method='post'>
            <input id="barraDeBusqueda" name="barraDeBusqueda">
            <select id="filtroDeLista" name="filtroDeLista">
                <option value="usuariosExistentes">Usuarios Existentes</option>
                <option value="usuariosEliminados">Usuarios Eliminados</option>
                <option value="todosLosUsuarios">Usuarios Existentes y Eliminados</option>
            <select>
            <button>Buscar</button>
        </form>
    </div>
    <div class="NuevoUsuario">
        <h3>Crear Usuario:</h3>
        <form action='api/v1/usuarios/crear' method='post'>
            @csrf
            <label>Documento de Identidad: </label>
            <input type="number" name="documentoDeIdentidad" required>
            <br><br>
            <label>Contraseña: </label>
            <input type="password" name="contrasenia" required>
            <br><br>
            <label>Repetir Contraseña: </label>
            <input type="password" name="contrasenia_confirmation" required>
            <br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Apellido: </label>
            <input type="text" name="apellido" required>
            <br><br>
            <label>Teléfono: </label>
            <input type="number" name="telefono" required>
            <br><br>
            <label>Correo Electrónico: </label>
            <input type="email" name="email" required>
            <br><br>
            <label>Dirección: </label>
            <input type="text" name="direccion" required>
            <br><br>
            <label>Rol:</label>
            <select id="rolDeLaEmpresa" name="rolDeLaEmpresa">
                <option value="usuarioComun">Usuario Común</option>
                <option value="administrador">Administrador</option>
                <option value="gerente">Gerente</option>
                <option value="cargador">Cargador</option>
                <option value="chofer">Chofer</option>
            </select>
            <br>
            <div class="contenedorInformacionCargador">
                <label class="rol" id="labelCarnetCargador">ID Carnet de Transporte: </label>
                <input class="rol" id="inputCarnetCargador" type="number" name="carnetTransporte">
            </div>
            <br>
            <div class="contenedorInformacionChofer">
                <label>ID de Licencia: </label>
                <input type="text" name="idLicencia" min="8" max="8">
                <label>Valido Desde: </label>
                <br>
                <label>Dia: </label>
                <input type="number" name="diaDesde" min="1" max="31">
                <br>
                <label>Mes: </label>
                <input type="number" name="mesDesde" min="1" max="12">
                <br>
                <label>Año: </label>
                <input type="number" name="anioDesde" min="1960" max="2007">
                <br><br>
                <label>Valido Hasta: </label>
                <br>
                <label>Dia: </label>
                <input type="number" name="diaHasta" min="1" max="31">
                <br>
                <label>Mes: </label>
                <input type="number" name="mesHasta" min="1" max="12">
                <br>
                <label>Año: </label>
                <input type="number" name="anioHasta" min="2024" max="9999">
            </div>
            <button type="submit">Añadir</button>
        </form>
    </div>
    <br><br>
    <div class="UsuarioAModificar">
        <h3>Modificar Usuario:</h3>
        <form id="formularioModificarUsuarios" action='api/v1/usuarios' method='post'>
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
        <form id="formularioEliminarUsuarios" action='api/v1/usuarios' method='post'>
            @method('DELETE')
            @csrf
            <label>Documento de Identidad: </label>
            <input id="inputFormularioEliminar" type="number" name="documentoDeIdentidad">
            <br><br>
            <button id="botonFormularioEliminarUsuarios" type="submit">Eliminar</button>
        </form>
    </div>
    <script src="../js/usuarios.js"></script>
</body>
</html>