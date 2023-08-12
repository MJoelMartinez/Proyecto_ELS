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
    <div class="NuevoUsuario">
        <h3>Crear Usuario:</h3>
        <form action='api/v1/Usuarios/Crear' method='post'>
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
            <br><br>
            <label class="rol" id="rolLabel">X</label>
            <input class="rol" id="rolInput" type="number" name="numeroDeRol">
            <br><br>
            <label class="rol" id="labelCarnetCargador">ID Carnet de Transporte: </label>
            <input class="rol" id="inputCarnetCargador" type="number" name="carnetTransporte">
            <br>
            <button type="submit">Añadir</button>
        </form>
    </div>
</body>
</html>