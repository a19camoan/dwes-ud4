<?php
    /**
     * Incluir en vuestro servidor un contador que indique al usuario el número de
     * veces que ha visitado el sitio.
     *
     * @version 1.0.0
     * @since 14-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */
    if(isset($_COOKIE["contador"])){
        $contador = $_COOKIE["contador"] + 1;
        setcookie("contador", $contador, time() + 60*60*24*365);
    } else {
        $contador = 1;
        setcookie("contador", $contador, time() + 60*60*24*365);
    }

    echo "<h1>Has visitado esta página " . $contador . " veces</h1>";
    echo "<p><a href='https://github.com/a19camoan/dwes-ud4' target='_blank'>Github</a></p>";
