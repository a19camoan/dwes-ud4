<?php
    /**
     * Escriba una página que permita crear una cookie de duración limitada,
     * comprobar el estado de la cookie y destruirla.
     *
     * @version 1.0.0
     * @since 13-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */

    if (isset($_POST["cookie"])) {
        $cookie = $_POST["cookie"];
        setcookie("cookie", $cookie, time() + 60);
        header("Location: " . $_SERVER["PHP_SELF"]);
    }

    if (isset($_POST["destruir"])) {
        setcookie("cookie", "", time() - 60);
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación cookie</title>
</head>

<body>
    <h1>Cookies</h1>

    <h2>Creación de cookie</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="cookie"><p>Valor de la cookie</p></label>
        <input type="text" name="cookie" id="cookie">
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <h2>Borrado de cookie</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="cookie">Borrar la cookie</label>
        <input type="submit" value="Borrar" name="destruir">
    </form>

    <h2>Comprobación de cookie</h2>
    <?php
        if (isset($_COOKIE["cookie"])) {
            echo "<p>El valor de la cookie es: " . $_COOKIE["cookie"] . "</p>";
        } else {
            echo "<p>La cookie no existe</p>";
        }
    ?>

        <p><a href="https://github.com/a19camoan/dwes-ud4" target="_blank">Github</a></p>
</body>

</html>
