<?php

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");

    header('Content-Type: application/json');

    $data=file_get_contents('todo.json');
    echo $data;