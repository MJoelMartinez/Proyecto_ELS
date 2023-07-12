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
    <button id="AñadirUsuario">Añadir Usuario</button>
    <br>
    <div class="NuevoUsuario">
        <form action='/Backoffice/Usuarios/Crear' method='post'>
            @csrf
            <label>Documento de Identidad: </label>
            <input type="number" name="documentoDeIdentidad" required>
            <br><br>
            <label>Nombre de Usuario: </label>
            <input type="text" name="nombreDeUsuarioLogin" required>
            <br><br>
            <label>Contraseña: </label>
            <input type="password" name="contrasenia" required>
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
            <br><br>
            <label class="rol" id="rolLabel">X</label>
            <input class="rol" id="rolInput" type="text" name="x">
            <br><br>
            <label class="rol" id="labelLicencia">ID Licencia de Conducir: </label>
            <input class="rol" id="inputLicencia" type="text" name="IDLicencia"> 
            <br><br>
            <button type="submit">Añadir</button>
        </form>
    </div>
    <button class="EliminarUsuario">Eliminar Usuario</button>
    <div class="UsuarioAEliminar">
        <form id="formularioEliminarUsuarios" action='/Backoffice/Usuarios/Eliminar' method='post'>
            @method('DELETE')
            @csrf
            <label>Documento de Identidad: </label>
            <input id="inputFormularioEliminar" type="number" name="documentoDeIdentidad">
            <br><br>
            <button id="botonFormularioEliminar" type="submit">Eliminar</button>
        </form>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>