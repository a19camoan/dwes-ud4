<?php
    /**
     * Implementa un sistema de autentificación utilizando las características del protocolo http.
     *
     * @version 1.0.0
     * @since 14-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */
    $usuario_autorizado = 'usuario';
    $contrasena_autorizada = 'contrasena_secreta';

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        $_SERVER['PHP_AUTH_USER'] !== $usuario_autorizado || $_SERVER['PHP_AUTH_PW'] !== $contrasena_autorizada) {
        header('WWW-Authenticate: Basic realm="Área restringida"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Autenticación requerida.';
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Área Restringida</h1>
    <p>Esta es una página protegida. Ingrese sus credenciales:</p>
    <form action="" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>
