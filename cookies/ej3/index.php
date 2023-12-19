<?php
    /**
     * Crea un formulario de login que permita al usuario recordar
     * los datos introducidos. Incluye una opción para borrar la información almacenada.
     *
     * @version 1.0.0
     * @since 13-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */
    if(isset($_POST["send"])){
        $nombre = $_POST["nombre"];
        $contrasenya = $_POST["contrasenya"];

        setcookie($nombre, $contrasenya, time() + 60*60*24*365);
        setcookie("nombre", $nombre, time() + 60*60*24*365);
        header("Location: saludo.php");
    }

    if(isset($_POST["borrar"])){
        $nombre = $_COOKIE["nombre"];
        setcookie("nombre", "", time() - 60*60*24*365);
        setcookie($nombre, "", time() - 60*60*24*365);
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login cookie</title>
</head>

<body>
    <h2>Inicio de sesión</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="nombre">Usuario: </label>
        <input type="text" name="nombre" id="nombre">

        <br>
        <label for="contrasenya">Contraseña: </label>
        <input type="password" name="contrasenya" id="contrasenya">

        <br>
        <input type="submit" name="send" value="Entrar">
    </form>

    <p><a href="https://github.com/a19camoan/dwes-ud4" target="_blank">Github</a></p>
</body>

</html>
