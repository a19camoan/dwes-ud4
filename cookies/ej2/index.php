<?php
    /**
     * Escriba una página que compruebe si el navegador permite crear cookies
     * y se lo diga al usuario (mediante una o más páginas).
     *
     * @version 1.0.0
     * @since 13-12-2023
     * @author Andrés <a19camoan@iesgrancapitan.org>
     */

    setcookie("cookie", "cookie", time() + 60);
    header("Location: ./salida.php");
