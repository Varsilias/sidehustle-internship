<?php

/**
 * This function calculates the sum of all the values of an array put together
 * * @param array $values
 */
function sum (array $values) {
    echo array_sum($values) .'<br/>';
}

sum([2, 4, 6, 8, 10]);