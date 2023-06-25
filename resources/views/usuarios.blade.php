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
    <button class="AñadirUsuario">+</button>
    <br>
    <div class="NuevoUsuario">
        <form action='/Backoffice/Usuarios/Crear' method='post'>
            @csrf
            <label>Documento de Identidad:</label>
            <input type="number" name="documentoDeIdentidad">
            <br><br>
            <label>Nombre de Usuario:</label>
            <input type="text" name="nombreDeUsuarioLogin">
            <br><br>
            <label>Contraseña:</label>
            <input type="password" name="contrasenia">
            <br><br>
            <label>Nombre:</label>
            <input type="text" name="nombre">
            <br><br>
            <label>Apellido:</label>
            <input type="text" name="apellido">
            <br><br>
            <label>Teléfono:</label>
            <input type="number" name="telefono">
            <br><br>
            <label>Dirección:</label>
            <input type="text" name="direccion">
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
            <button type="submit">Añadir</button>
        </form>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>