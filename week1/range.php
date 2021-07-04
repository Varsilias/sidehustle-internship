<?php

/**
 * This function prints the range of values from the start up ans including the end
 * @param int|float $start
 * @param int|float $end
 * 
 */

function customRange ($lowest, $highest) {
    $start = $lowest;
    $end = $highest;
    $arr = [];
    $limit = ($highest - $lowest) + 1;
    for ($i=0; $i < $limit; $i++) { 
        array_push($arr, $start);
        $start++;
    }

    $newArray = $arr;
    return $newArray;
}
echo '<pre>';
print_r(customRange(20, 40));
echo '<pre>';







// function rangee ($start, $end) {
//     $values = range($start, $end);
//     // echo $values;
//     print_r($values);
//     return $values;
// }

// rangee(20, 40);