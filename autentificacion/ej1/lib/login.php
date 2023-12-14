<?php
    /**
     * Proceso de autenticación.
     */
    if (!isset($_POST["send"])) {
        header("Location: ../");
    }

    session_start();
    include_once "../config/users.php";
    date_default_timezone_set("Europe/Madrid");

    function textInput($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $inputUser = textInput($_POST["user"]);
    $pass = textInput($_POST["password"]);
    $accesHour = date("H:i:s");

    $authentication = false;
    $authUser = "invitado";

    foreach ($users as $key => $value) {
        if ($value["name"] == $inputUser && $value["password"] == $pass) {
            $authentication = true;
            $authUser = $value["name"];
            break;
        }
    }

    $_SESSION["auth"] = $authentication;
    $_SESSION["user"] = $authUser;
    $_SESSION["accesHour"] = $accesHour;
    header("Location: ../");
