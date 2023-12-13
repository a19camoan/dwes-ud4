<?php
    /**
     * Desarrolla una aplicación que genere un script para la creación de usuarios a partir de un fichero.
     * 
     * Opción A: MYSQL
     * Usuario: nAAaa_1daw
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
    include ("../config/config.php");
    if (!isset($_POST["submit"]) || !in_array($_POST["system"], SYSTEMS) || !in_array($_POST["course"], COURSES) || !in_array($_POST["academic_year"], YEARS) || !isset($_FILES["file"]) || $_POST["year"] < 1 || $_POST["year"] > 2) {
        header("Location: ../");
    }

    include("./normalize_text.php");
    $users = normalice_text($_FILES["file"]["tmp_name"]);
    var_dump($users);
