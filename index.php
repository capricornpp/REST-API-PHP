<?php

    require_once('dbconfig.php');

    $db = new Database('localhost','persons','root','');

    if($_SERVER['REQUEST_METHOD'] == "GET") {
        // json_encode => แปลง php array(fetch) เป็น json format 
        echo json_encode($db->query('SELECT * FROM persons_info')); 
    } else if($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "This is POST";
    } else {
        http_response_code(405);
    }
?>