<?php
    /**
     * Crear una pequeña aplicación para gestionar una agenda de contactos.
     *
     * @version 1.0.0
     * @since 14-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */
    if (!isset($_SESSION["agenda"])) {
        session_start();
    }

    if (isset($_POST["submit"])) {
        $_SESSION["agenda"][$_POST["nombre"]] = $_POST["telefono"];
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>

<body>
    <h1>Agenda de contactos</h1>

    <h2>Añadir contacto</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">

        <br>
        <label for="telefono">Teléfono: </label>
        <input type="text" name="telefono" id="telefono">

        <br>
        <input type="submit" value="Añadir" name="submit">
    </form>

    <?php
        if (isset($_SESSION["agenda"])) {
            echo "<h2>Lista de contactos</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Teléfono</th>";
            echo "</tr>";
            foreach ($_SESSION["agenda"] as $nombre => $telefono) {
                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$telefono</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <h2>Borrar agenda</h2>
    <form action="./closeSession.php" method="post">
        <input type="submit" value="Borrar agenda" name="borrar">
    </form>
</body>

</html>
