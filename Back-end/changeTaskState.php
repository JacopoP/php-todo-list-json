<?php

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");

    header('Content-Type: application/json');
    
    
    $jsonTaskList = file_get_contents("todo.json");
    $tasksList = json_decode($jsonTaskList, true);
    $taskN = $_GET['task'];
    $task = $tasksList[$taskN]["done"] = !($task = $tasksList[$taskN]["done"]);
    $jsonTaskList = json_encode($tasksList);
    file_put_contents('todo.json', $jsonTaskList);
