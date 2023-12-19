<?php
    /**
     * Dibuja el calendario del mes y año indicados.
     */
    $diasMes = $meses[$mes];

    if ($mes == "Febrero" && $anno % 4 == 0) {
        $diasMes++;
    }

    # Obtener el día de la semana en el que empieza el mes
    $diaSemana = date("w", mktime(0, 0, 0, array_search($mes, array_keys($meses)) + 1, 1, $anno));
    $diaSemana--;

    if ($diaSemana == -1) {
        $diaSemana = 6;
    }

    echo <<<TBL
        <table border='1'>
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
            <tr>
TBL;
    # Añadir celdas vacías al principio del mes si es necesario
    for ($i = 0; $i < $diaSemana; $i++) {
        echo "<td></td>";
    }

    for ($i = 1; $i <= $diasMes; $i++) {
        # Formatear la fecha para poder compararla con los festivos
        $fecha = sprintf("%d-%1d", $i, array_search($mes, array_keys($meses)) + 1);

        # Si está el usuario autenticado, mostrar en negrita los días que tienen tareas
        if ($_SESSION["auth"] && isset($_SESSION["tareas"])) {
            $fechaTareas = [];
            foreach ($_SESSION["tareas"] as $key => $value) {
                $fechaTareas[explode("-", $key)[0] . "-" . explode("-", $key)[1]] = explode("-", $key)[2];
            }
        }

        if ($i == $diaActual && $mes == array_keys($meses)[$mesActual - 1] && $anno == $annoActual) {
            if (in_array($fecha, array_keys($fechaTareas)) && $anno == $fechaTareas[$fecha]) {
                echo "<td style='background-color: $colorActual'><strong>$i</strong></td>";
            } else {
                echo "<td style='background-color: $colorActual'>$i</td>";
            }
        } elseif (in_array($fecha, $festivosNacionales)) {
            if (in_array($fecha, array_keys($fechaTareas)) && $anno == $fechaTareas[$fecha]) {
                echo "<td style='background-color: $colorNacional'><strong>$i</strong></td>";
            } else {
                echo "<td style='background-color: $colorNacional'>$i</td>";
            }
        } elseif (in_array($fecha, $festivosComunidades)) {
            if (in_array($fecha, array_keys($fechaTareas)) && $anno == $fechaTareas[$fecha]) {
                echo "<td style='background-color: $colorComunidad'><strong>$i</strong></td>";
            } else {
                echo "<td style='background-color: $colorComunidad'>$i</td>";
            }
        } elseif (in_array($fecha, $festivosLocales)) {
            if (in_array($fecha, array_keys($fechaTareas)) && $anno == $fechaTareas[$fecha]) {
                echo "<td style='background-color: $colorLocal'><strong>$i</strong></td>";
            } else {
                echo "<td style='background-color: $colorLocal'>$i</td>";
            }
        } else {
            if (in_array($fecha, array_keys($fechaTareas)) && $anno == $fechaTareas[$fecha]) {
                echo "<td><strong>$i</strong></td>";
            } else {
                echo "<td>$i</td>";
            }
        }

        $diaSemana++;
        # Al llegar al domingo, cerrar la fila y abrir una nueva
        if ($diaSemana == 7) {
            echo "</tr>";
            if ($i < $diasMes) {
                echo "<tr>";
            }
            $diaSemana = 0;
        }
    }

    # Al final del bucle, añadir celdas vacías si es necesario
    if ($diaSemana !== 0) {
        for ($i = $diaSemana; $i < 7; $i++) {
            echo "<td></td>";
        }
        echo "</tr>"; // Cerrar la última fila
    }
    echo "</table>";
