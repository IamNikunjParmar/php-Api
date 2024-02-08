<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: GET");

    include("../../config/config.php");

    $config = new Config();

    $res = array();
   

    if($_SERVER['REQUEST_METHOD'] == "POST") {

      $id = $_POST['id'];
      
      $name = $_POST['name'];

      $m_id = $_POST['m_id'];

      $res['msg'] = $config->insertfk($id,$name,$m_id);
      
      

    }
    else {
        $res['msg'] = "Only POST  method is allowed...";
    }

    echo json_encode($res);
?>