<?php

    $in_array= [
        [
            'text' => 'todo 1',
            'done' => true
        ],
        [
            'text' => 'todo 2',
            'done' => false
        ],
        [
            'text' => 'todo 3',
            'done' => false
        ],
        [
            'text' => 'todo 4',
            'done' => true
        ]
        ];

    $in_json=json_encode($in_array);
    file_put_contents('todo.json', $in_json);