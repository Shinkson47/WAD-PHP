<?php

/**
 * Inherently creates an array instance.
 */
$pandas = ['Lushui', 'Jasmina', 'Pali'];


/*
 * Some inert values.
 */
$one    = 1;
$two    = 2;
$three  = 3;

/**
 * Create an array of zval references.
 */
$variables = array($one, $two, $three);

/**
 * Creates an array instance with an api call to _types.array
 *
 * Members of the same array DO NOT have to have the same data type, unlike java.
 * Mix and match!
 */
$pandas = array($one, "yeet", 7, 3.2);

$_one        = $pandas[0];
$_yeet       = $pandas[1];
$_7          = $pandas[2];
$_3_2        = $pandas[3];

$outOfBounds = $pandas[4];
// Exception given => PHP Notice:  Undefined offset: 4 in <FILENAME> on line 33

/*
 * A Notice is not quite an error, but it's not ideal.
 * Unlike java, being out of bounds is not fatal if not handled - it's just dismissed.
 */

// Associative array. Similar to hash tables, values are associated with a key.
$numbers = [
    'one'       => 1,
    'two'       => 2,
    'three'     => 3,
    'four'      => 4,
    'five'      => 5,
    'six'       => 6
];

// These values cannot be gotten by index.
echo $numbers[0];
// PHP Notice:  Undefined offset: 0 in <FILENAME> on line 101

// Dump value by key
echo $numbers['three'];
// echo's "3".

// Multi dimentional
$numbers = [
    'prime'         => [2, 3, 5, 7, 11],
    'fibonacci'     => [1, 1, 2, 3, 5],
    'triangular'    => [1, 3, 6, 10, 15]
];