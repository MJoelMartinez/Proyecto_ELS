<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/Icon.png">
    <title>E.L.S - Iniciar Sesión</title>
</head>
<body>
    <form action='http://localhost:8001/api/v1/IniciarSesion' method='post'>
        <label>Correo Electrónico: </label>
        <input type="email" name="email" required>
        <br><br>
        <label>Contraseña: </label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit">Continuar</button>
    </form>
</body>
</html>