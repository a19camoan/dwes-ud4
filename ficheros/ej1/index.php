<?php
    /**
     * Desarrolla una aplicación que genere un script para la creación de usuarios a partir de un fichero.
     * 
     * Opción A: MYSQL
     * Usuario: AAaan_1daw
     * BD: bdAAaann_1daw
     * AA: Dos primeras letras del primer apellido.
     * aa: Dos primeras letras del segundo apellido.
     * n: Inicial del nombre.
     * Ayuda:
     * BD: CREATE DATABASE bdejemplo
     * Usuarios: GRANT ALL PRIVILEGES ON bdejemplo.* TO ‘usuario’@’localhost’
     * IDENTIFIED BY ‘clave’;
     * 
     * Opción B: ORACLE
     * 
     * Opción C: LINUX
     * 
     * Crear un formulario para parametrizar la generación del fichero.
     * 
     * @author Andrés Castillero <a19camoan@iesgrancapitan.org>
     */
    include "./config/config.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generación usuarios</title>
</head>

<body>
    <header>
        <h1>Generación de usuarios</h1>
    </header>
    <main>
        <form action="./lib/generate_script.php" method="post" enctype="multipart/form-data">
            <label for="file">Archivo CSV: </label>
            <input type="file" name="file" required>

            <br/>
            <label for="system">Elija sistema: </label>
            <select name="system" required>
                <?php
                    foreach (SYSTEMS as $system) {
                        echo "<option value='$system'>" . ucfirst($system) . "</option>";
                    }
                ?>
            </select>

            <br/>
            <label for="course">Elija su curso: </label>
            <select name="course" required>
                <?php
                    foreach (COURSES as $course) {
                        echo "<option value='$course'>$course</option>";
                    }
                ?>
            </select>

            <br/>
            <label for="number">Introduzca el año: </label>
            <input type="number" name="year" max="2" min="1" required>

            <br/>
            <label for="academic_year">Introduzca el curso académico: </label>
            <select name="academic_year" required>
                <?php
                    foreach (YEARS as $year) {
                        echo "<option value='$year'>$year</option>";
                    }
                ?>
            </select>

            <br/>
            <input type="submit" name="submit" value="Generar">
        </form>
    </main>
</body>

</html>
