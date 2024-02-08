<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: POST");

    include("../../config/config.php");

    $res = array();
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $movie_name = $_POST['movie_name'];

        $result = $config->insert($movie_name);

        $res['msg'] = $result ? "Inserted..." : "Failled...";

        http_response_code($result ? 201 : 404);

    }
    else {
        $res['msg'] = "Only POST method is allowed...";
    }

    echo json_encode($res);

?>