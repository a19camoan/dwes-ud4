<?php
    /**
     * Incorpora a tu servidor un mensaje que indique al usuario el tiempo transcurrido
     * desde su último acceso y un mensaje personalizado en función de éste.
     *
     * @version 1.0.0
     * @since 14-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */
    if (isset($_COOKIE["visita"])) {
        $visita = $_COOKIE["visita"];
        $tiempo = time() - $visita;
        setcookie("visita", time(), time() + 60 * 60 * 24 * 365);
    } else {
        $tiempo = 0;
        setcookie("visita", time(), time() + 60 * 60 * 24 * 365);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Última visita</title>
</head>

<body>
    <?php
        if ($tiempo == 0) {
            echo "<h1>Bienvenido a nuestra página</h1>";
        } else {
            echo "<h1>Última visita: " . $tiempo . " segundos</h1>";
        }
    ?>
    <p><a href="https://github.com/a19camoan/dwes-ud4" target="_blank">Github</a></p>
</body>

</html>
