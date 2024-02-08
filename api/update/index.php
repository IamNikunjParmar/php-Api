<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: PUT, PATCH");

    include("../../config/config.php");

    $res = array();
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH") {

        $data = file_get_contents("php://input");  
        $record = array();
        parse_str($data,$record);  

        $id = $record['id'];
        $name = $record['name'];
        $m_id = $record['m_id'];

        $res['msg'] = $config->update($id,$name,$m_id);

    }
    else {
        $res['msg'] = "Only PUT or PATCH method is allowed...";
    }

    echo json_encode($res);

?>