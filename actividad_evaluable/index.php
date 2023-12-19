<?php
    /**
     * El objetivo de esta actividad es añadir nuevas funcionalidades al proyecto de calendario.
     *
     * En la situación actual del proyecto la aplicación permite seleccionar mes y año y muestra
     * el calendario correspondiente. Utiliza colores diferentes para marcar:
     *
     * • Día actual.
     * • Festivos nacionales.
     * • Festivos de comunidad.
     * • Festivos locales.
     *
     * La nuevas funcionalidades que debes incorporar a la aplicación son las siguientes.
     *
     * • Preferencias de usuario en la utilización de colores para mostrar los diferentes tipos de días.
     * • Uso de un fichero de texto para almacenar las credenciales de usuario. Para simplificar la aplicación
     *      trabajaremos con un único usuario registrado.
     * • Añadir un gestor de tareas para el usuario registrado. Como mínimo deberás implementar el alta de una
     *       nueva tarea.
     * • Mostrar en negrita los días que tienen tareas.
     * • Utilizar un fichero de texto para guardar y recuperar las tareas del usuario.
     */
    session_start();
    if (!isset($_SESSION["auth"])) {
        $_SESSION["auth"] = false;
    }
    include_once "./config/config.php";

    $diaActual = date("j");
    $mesActual = date("n");
    $annoActual = date("Y");

    # Si ya se ha leído el fichero, no se vuelve a leer.
    if (empty($_SESSION["usuarios"])) {
        $usuarios = [];
        $usuariosFile = fopen("./files/users.txt", "r");
        while (!feof($usuariosFile)) {
            $linea = fgets($usuariosFile);
            $usuario = trim(explode(" ", $linea)[0] ?? '');
            $contrasena = trim(explode(" ", $linea)[1] ?? '');
            if (!empty($usuario) && !empty($contrasena)) {
                $usuarios[$usuario] = $contrasena;
            }
        }
        fclose($usuariosFile);
        $_SESSION["usuarios"] = $usuarios;
    }

    if (
        isset($_POST["colorDiaActual"]) && isset($_POST["colorFestivosNacionales"])
        && isset($_POST["colorFestivosComunidad"]) && isset($_POST["colorFestivosLocales"])
    ) {
        $_SESSION["colorDiaActual"] = $_POST["colorDiaActual"];
        $_SESSION["colorFestivosNacionales"] = $_POST["colorFestivosNacionales"];
        $_SESSION["colorFestivosComunidad"] = $_POST["colorFestivosComunidad"];
        $_SESSION["colorFestivosLocales"] = $_POST["colorFestivosLocales"];
    } elseif (
        !isset($_SESSION["colorDiaActual"]) && !isset($_SESSION["colorFestivosNacionales"])
        && !isset($_SESSION["colorFestivosComunidad"]) && !isset($_SESSION["colorFestivosLocales"])
    ) {
        $_SESSION["colorDiaActual"] = DEFAULT_COLOR_ACTUAL;
        $_SESSION["colorFestivosNacionales"] = DEFAULT_COLOR_NACIONAL;
        $_SESSION["colorFestivosComunidad"] = DEFAULT_COLOR_COMUNIDAD;
        $_SESSION["colorFestivosLocales"] = DEFAULT_COLOR_LOCAL;
    }

    $colorActual = $_SESSION["colorDiaActual"];
    $colorNacional = $_SESSION["colorFestivosNacionales"];
    $colorComunidad = $_SESSION["colorFestivosComunidad"];
    $colorLocal = $_SESSION["colorFestivosLocales"];

    if (isset($_POST["mes"]) && isset($_POST["anno"])) {
        $mes = $_POST["mes"];
        $anno = $_POST["anno"];
        $_SESSION["mes"] = $mes;
        $_SESSION["anno"] = $anno;
    } elseif (!isset($_SESSION["mes"]) && !isset($_SESSION["anno"])) {
        $mes = $mesActual;
        $anno = $annoActual;
        $_SESSION["mes"] = $mes;
        $_SESSION["anno"] = $anno;
    } else {
        $mes = $_SESSION["mes"];
        $anno = $_SESSION["anno"];
    }

    if (isset($_POST["tarea"]) && isset($_POST["fecha"])) {
        $usuario = $_SESSION["usuario"];
        $tarea = trim($_POST["tarea"]);
        # Pasamos del formato YYYY-MM-DD al formato DD-MM-YYYY
        $fecha = implode("-", array_reverse(explode("-", trim($_POST["fecha"]))));
        $tareasFile = fopen("./files/tasks_$usuario.txt", "a");
        fwrite($tareasFile, "$tarea|$fecha\n");
        fclose($tareasFile);
    }

    if ($_SESSION["auth"]) {
        $usuario = $_SESSION["usuario"];
        $tareas = [];
        $tareasFile = fopen("./files/tasks_$usuario.txt", "r");
        while (!feof($tareasFile)) {
            $linea = fgets($tareasFile);
            $tarea = trim(explode("|", $linea)[0] ?? '');
            $fecha = trim(explode("|", $linea)[1] ?? '');
            if (!empty($tarea) && !empty($fecha)) {
                $tareas[$fecha] = $tarea;
            }
        }
        fclose($tareasFile);
        $_SESSION["tareas"] = $tareas;
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Andrés Castillero Moriana">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3652/3652191.png" type="image/x-icon">
    <title>Calendario</title>
</head>

<body>
    <h1>Calendario</h1>
    <div class="calendar">
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="mes">Mes</label>
                <select name="mes" id="mes">
                    <?php
                        foreach ($meses as $mess => $dias) {
                            if (isset($mes) && $mes == $mess) {
                                echo "<option value='$mess' selected>$mess</option>";
                            }
                            else {
                                echo "<option value='$mess'>$mess</option>";
                            }
                        }
                    ?>
                </select>
                <label for="anno">Año</label>
                <select name="anno" id="anno">
                    <?php
                        for ($i = 1900; $i <= 2100; $i++) {
                            if (isset($anno) && $anno == $i) {
                                echo "<option value='$i' selected>$i</option>";
                            }
                            else {
                                echo "<option value='$i'>$i</option>";
                            }
                        }
                    ?>
                </select>
                <input type="submit" value="Mostrar calendario">
            </form>
            <?php
                if (isset($_POST["mes"]) && isset($_POST["anno"])) {
                    include_once "./lib/dibujarCalendario.php";
                }
            ?>
        </div>
        <div>
            <h2>Personalice los colores</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="colorDiaActual">Color del día actual</label>
                <input type="color" name="colorDiaActual" id="colorDiaActual" value="<?php echo $colorActual; ?>">
                <label for="colorFestivosNacionales">Color de los festivos nacionales</label>
                <input type="color" name="colorFestivosNacionales" id="colorFestivosNacionales"
                    value="<?php echo $colorNacional; ?>">
                <label for="colorFestivosComunidad">Color de los festivos de comunidad</label>
                <input type="color" name="colorFestivosComunidad" id="colorFestivosComunidad"
                    value="<?php echo $colorComunidad; ?>">
                <label for="colorFestivosLocales">Color de los festivos locales</label>
                <input type="color" name="colorFestivosLocales" id="colorFestivosLocales"
                    value="<?php echo $colorLocal; ?>">
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
    <div class="file">
        <div>
            <?php
                if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
                    $usuarios = $_SESSION["usuarios"];
                    $usuario = trim($_POST["usuario"]);
                    $contrasena = trim($_POST["contrasena"]);
                    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["auth"] = true;
                    }
                }

                if ($_SESSION["auth"]) {
                    # Si el usuario está autentificado se muestra el gestor de tareas.
                    $usuario = $_SESSION["usuario"];
                    echo "<h2>Gestor de tareas de $usuario</h2>";
                    echo<<<FORM
                        <form action="{$_SERVER['PHP_SELF']}" method="post">
                            <label for="tarea">Tarea</label>
                            <input type="text" name="tarea" id="tarea" required>
                            <label for="tarea">Fecha</label>
                            <input type="date" name="fecha" id="fecha" required>
                            <input type="submit" value="Añadir">
                        </form>
FORM;
                } else {
                    # Si el usuario no está autentificado se muestra el formulario de autentificación.
                    echo<<<FORM
                        <h2>Autentificación</h2>
                        <form action="{$_SERVER['PHP_SELF']}" method="post">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" id="usuario" required>
                            <label for="contrasena">Contraseña</label>
                            <input type="password" name="contrasena" id="contrasena" required>
                            <input type="submit" value="Iniciar sesión">
                        </form>
FORM;
                }
            ?>
        </div>
    </div>
</body>

</html>
