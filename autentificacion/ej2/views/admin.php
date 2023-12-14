<?php
    session_start();
    if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
        header("Location: ../");
    }

    include_once "../config/users.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
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
        </table>
    </div>
    <p><a href="../">Atrás</a></p>
</body>

</html>
