<?php
    if (isset($_COOKIE["nombre"])) {
        $nombre = $_COOKIE["nombre"];
        echo "<h1>Bienvenido " . $nombre . "</h1>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' name='borrar' value='Borrar'>";
        echo "</form>";
    } else {
        header("Location: index.php");
    }
