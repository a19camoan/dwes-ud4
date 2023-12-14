<?php
    if($_SESSION["role"] != "admin" || !isset($_SESSION["role"])) {
        header("Location: ../");
    }
?>
<li><a href="./views/admin.php">Cosas de administrador</a></li>
