<?php

/**
 * <h1>Performs a mathematical function with two parameters</h1>
 *
 * Where the function is an abstract mathematical closure that accepts exactly
 * two parameters.
 *
 * @param Closure $type The closure abstract to use to perform the calculation.
 * @param mixed $first Parameter one, The most dominant numeric in the function.
 * @param mixed $second Parameter two, the modifier number in the function.
 * @return mixed Value calculated by {@link $type}
 */
function math(Closure $type, $first, $second) {
    return $type($first, $second);
}

/**
 * Abstract mathematical addition function
 *
 * Performs a mathematical addition on the two parameters
 * @param $first
 * @param $second
 * @return mixed {@link $first} + {@link $second}
 */
$addition = function ($first, $second) {
    return $first + $second;
};

/**
 * Abstract mathematical subtraction function
 *
 * Performs a mathematical subtraction on the two parameters
 * @param $first
 * @param $second
 * @return mixed {@link $first} - {@link $second}
 */
$subtraction = function ($first, $second) {
    return $first - $second;
};

/**
 * Abstract mathematical modulus function
 * @param mixed $base The numeric to perform the modulus on
 * @param mixed $divider the modulus division value
 * @return int The rounded remainder after modulus division
 */
$modulo = function ($base, $divider) {
    return $base % $divider;
};

/**
 * Abstract mathematical division function
 * @param mixed $top
 * @param mixed $bottom
 * @return mixed The result of {@link $top} / {@link $bottom}.
                 If either {@link $top} or {@link $bottom} is zero, zero is returned.
 */
$divide = function($top, $bottom){
    return ($top == 0 || $bottom == 0) ? 0 : $top / $bottom;
};


var_dump(math($divide, 1, 10));
var_dump(math($divide, 1, 0));
var_dump(math($divide, 70, 40));

var_dump(math($addition, 1, 10));
var_dump(math($addition, 1, 0));
var_dump(math($addition, 70, 40));


