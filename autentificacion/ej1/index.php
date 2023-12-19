<?php
    /**
     * Crea un sistema básico de autenticación en PHP. El objetivo es permitir que los usuarios
     * se autentiquen con un nombre de usuario y una contraseña para acceder al área protegida.
     *
     * Utiliza un array de configuración para almacenar los usuarios registrados en el sistema.
     *
     * Si no estamos autenticados en el sistema, la página de inicio mostrará:
     *   formulario de login
     *   información pública de inicio
     *   menú de navegación por la zona pública.
     *
     * Si estamos autenticados en el sistema, la página de inicio mostrará:
     *   información de usuario con opción de cierre de sesión
     *   hora de inicio de sesión
     *   información pública de inicio
     *   menú de navegación por la zona pública y privada.
     *
     * Las páginas de la aplicación solo deben mostrar un mensaje indicando si son públicas o privadas.
     *
     * @version 1.0.0
     * @since 14-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */
    include_once "./config/users.php";
    session_start();

    if (!isset($_SESSION["auth"])) {
        $_SESSION["auth"] = false;
        $_SESSION["user"] = "Invitado";
    }

    # Está separada del if anterior para que se ejecute siempre que se inicie sesión porque si no me da error.
    if (!isset($_SESSION["accesHour"])) {
        $_SESSION["accesHour"] = date("H:i:s");
    }

    $authentication = $_SESSION["auth"];
    $user_actual = $_SESSION["user"];
    $accesHour = $_SESSION["accesHour"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación</title>
</head>

<body>
    <h1>Ejercicio de autenticación</h1>

    <nav>
        <?php
            if ($authentication) {
                include_once "./views/userNav.php";
            } else {
                include_once "./views/guestNav.php";
            }
        ?>
    </nav>

    <div id="sesion">
        <?php
            if ($authentication) {
                echo "<h2>Bienvenido: " . $user_actual . "</h2>";
                echo "<p>Hora de inicio de sesión: " . $accesHour . "</p>";
                echo "<a href='./lib/closeSession.php'><p>Cerrar sesión</p></a>";
            } else {
                include_once "./views/loginForm.php";
            }
        ?>
    </div>

    <div class="public_info">
        <h2>Información pública</h2>
        <p>Nunc eu mi at arcu porta tempor ac vel ex. Aliquam erat volutpat. Donec placerat arcu nec ante elementum
            mattis. Quisque vel quam vitae neque eleifend pulvinar. Vivamus libero lacus, mattis vel viverra non,
            lobortis sed nunc. Nunc sollicitudin, odio non fringilla laoreet, orci justo tempus massa, pretium eleifend
            ex nisi sed diam. Donec tempor libero ex, id interdum neque elementum nec.</p>
        <p>Praesent sollicitudin ut libero eu scelerisque. Nulla sodales tempor lacus, non imperdiet orci varius quis.
            Quisque scelerisque felis ac magna placerat aliquet. Maecenas pulvinar est sed justo elementum pulvinar.
            Curabitur varius tellus sed tincidunt aliquet. Donec at semper eros. In ornare volutpat purus, et finibus
            lorem feugiat ut. Donec vel quam at ex pellentesque ullamcorper. Sed convallis vitae elit in venenatis.
            Maecenas pulvinar ac orci vel volutpat. Ut ac est risus. Integer porta mauris a nunc dapibus tristique. Nunc
            venenatis efficitur ex eget condimentum. Vivamus molestie ipsum vitae quam tempus tempor. Vestibulum feugiat
            lorem dolor, sed ultrices libero condimentum id. Orci varius natoque penatibus et magnis dis parturient
            montes, nascetur ridiculus mus.</p>
    </div>
</body>

</html>
