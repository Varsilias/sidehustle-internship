<?php

/**
 * This function calculates the sum of all the values of an array put together
 * * @param array $values
 * * @return int  $result
 */
function sum (array $values) {
    $arrLength = count($values);
    $result = 0;
    for ($i=0; $i < $arrLength; $i++) { 
        $result += $values[$i];
    }
    return $result;
}

echo(sum([20, 202, 400, 1000]));