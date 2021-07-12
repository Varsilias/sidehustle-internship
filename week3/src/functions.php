<?php

function isCompleted($param) {
    if ($param === '0') {
        $param = 'No';
    } else {
        $param = 'Yes';
    }
    return $param;
}

function completedToBool($param) {
    if ($param == 'on') {
        $param = 1;
    } else if ($param == null || $param != 'on') {
        $param = 0;
    }
   

    return $param;
}

function validateTodo($todo) {
    $trimmedTodo = trim($todo);
    $escapeJs = stripslashes($trimmedTodo);
    $data = htmlspecialchars($escapeJs);
    return $data;

}

function getCompletedArrayCount($arr) {
    $completed = [];
    for ($i=0; $i < count($arr); $i++) {
        $placeholder = $arr[$i];
        if ($placeholder['completed'] == 1) {
            array_push($completed, $placeholder['completed']);  
        }
    }

    $newArr = $completed;
    return $newArr;
}