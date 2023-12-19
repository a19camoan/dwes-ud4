<?php
    /**
     * Días festivos nacionales, de comunidad y locales.
     * Además, se incluyen los meses y sus días.
     */
    $festivosNacionales = [
        "1-1",
        "6-1",
        "1-5",
        "15-8",
        "12-10",
        "1-11",
        "6-12",
        "8-12",
        "25-12",
    ];

    $festivosComunidades = [
        "28-2",
        "29-2",
        "19-6",
        "8-9",
        "31-5",
        "9-10",
        "2-5",
        "23-4",
        "3-12",
        "9-6",
        "24-9",
        "26-12",
        "23-4",
        "25-7",
        "28-7",
        "8-9",
        "17-5",
        "30-5",
        "1-3",
        "2-9",
    ];

    $festivosLocales = [
        "24-6",
        "3-8",
        "19-3",
        "28-2",
        "26-8",
        "8-9",
        "15-9",
        "19-8",
        "7-9",
        "21-9",
        "9-9",
        "15-8",
        "9-10",
        "29-9",
        "15-5",
        "2-8",
        "29-6",
        "23-4",
        "29-6",
        "12-6",
        "25-7",
        "25-7",
        "4-9",
        "12-6",
        "3-12",
        "9-6",
        "24-9",
        "29-5",
        "23-9",
        "10-8",
        "31-7",
        "5-8",
        "31-7",
        "28-7",
        "8-9",
        "16-8",
        "4-10",
        "21-6",
        "16-8",
        "2-2",
        "1-3",
        "2-9",
        "17-9"
    ];

    $meses = [
        "Enero" => 31,
        "Febrero" => 28,
        "Marzo" => 31,
        "Abril" => 30,
        "Mayo" => 31,
        "Junio" => 30,
        "Julio" => 31,
        "Agosto" => 31,
        "Septiembre" => 30,
        "Octubre" => 31,
        "Noviembre" => 30,
        "Diciembre" => 31
    ];

    # Colores por defecto
    define("DEFAULT_COLOR_ACTUAL", "#ff0000");
    define("DEFAULT_COLOR_NACIONAL", "#00ff00");
    define("DEFAULT_COLOR_COMUNIDAD", "#0000ff");
    define("DEFAULT_COLOR_LOCAL", "#ffff00");
