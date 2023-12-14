<?php
    if($_SESSION["role"] != "admin" || !isset($_SESSION["role"])) {
        header("Location: ../");
    }

    include_once "./config/users.php";
?>
<div>
    <h2>Información de admin</h2>
    <p>Esta apartado es privado y solo puede ser vista por el administrador.</p>
    <h3>Listado de usuarios</h3>
    <table border="1">
        <tr>
            <th>Usuario</th>
            <th>Rol</th>
        </tr>
        <?php
            foreach ($users as $data) {
                echo "<tr>";
                echo "<td>" . $data["name"] . "</td>";
                echo "<td>" . $data["role"] . "</td>";
                echo "</tr>";
            }
        ?>
</div>
