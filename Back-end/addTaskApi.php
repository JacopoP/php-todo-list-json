<?php

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");

    header('Content-Type: application/json');
    
    
    $jsonTaskList = file_get_contents("todo.json");
    $tasksList = json_decode($jsonTaskList);
    $taskTxt = $_GET['task'];
    $tasksList[] = [
        "text" => $taskTxt,
        "done" => false,
    ];
    $jsonTaskList = json_encode($tasksList);
    file_put_contents('todo.json', $jsonTaskList);
