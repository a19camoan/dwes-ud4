<?php
    /**
     * Función que pasa todo el archivo a minúsulas, quita todas las tildes y borro las comas.
     * Devuelve un array con los usuarios en el formato nAAaa_[año][curso].
     * n = primera letra del nombre.
     * AA = primeras 2 letras del primer apellido.
     * aa = primeras 2 letras del segundo apellido.
     * 
     * En caso de que solo tenga un apellido el formato será nAA_[año][curso].
     * Si hubiesen usuarios iguales se añadirá un contador que empieza en 1 al final.
     * Ej: apola_2daw, elipo_1asir, apola_2daw1, ...
     * 
     * @author Andrés Castillero <a19camoan@iesgrancapitan.org>
     */

    function buildUserName($name, $firstSurname, $secondSurname)
    {
        $name = substr($name, 0, 1);
        $firstSurname = substr($firstSurname, 0, 2);
        $secondSurname = substr($secondSurname, 0, 2);

        return $name . $firstSurname . $secondSurname . "_" . $_POST["year"] . $_POST["course"];
    }

    function normalice_text($text)
    {
        $users = [];
        $file = fopen($text, "r");
    
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $line = trim($line);
                $line = strtolower($line);
                $line = str_replace("á", "a", $line);
                $line = str_replace("é", "e", $line);
                $line = str_replace("í", "i", $line);
                $line = str_replace("ó", "o", $line);
                $line = str_replace("ú", "u", $line);
                $line = str_replace("ñ", "n", $line);
                $line = str_replace(",", "", $line);
    
                // Divide la línea en palabras (suponiendo que están separadas por espacios)
                $words = explode(" ", $line);
    
                // Inicializamos las variables de nombre y apellidos
                $name = "";
                $firstSurname = "";
                $secondSurname = "";
    
                // Si hay al menos 3 palabras, asumimos que el primer nombre está en la última posición
                if (count($words) >= 3) {
                    $name = array_pop($words);
                }
    
                // Los apellidos son todo lo que queda
                $apellidos = $words;
                $firstSurname = array_shift($apellidos); // Tomamos el primer apellido
    
                // Si quedan palabras en $apellidos, combinamos el resto en el segundo apellido
                if (!empty($apellidos)) {
                    $secondSurname = implode(" ", $apellidos);
                }
    
                // Aquí puedes aplicar la lógica para construir el nombre de usuario
                $user = buildUserName($name, $firstSurname, $secondSurname);
    
                $users[] = $user;
            }
    
            fclose($file);
        }
    
        return $users;
    }
    