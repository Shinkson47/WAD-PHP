<?php
$var = 'Bob';
$Var = 'Joe';
echo "$var, $Var"; // outputs "Bob, Joe"
//$4site = 'not yet'; // invalid; starts with a number
$_4site = 'not yet'; // valid; starts with an underscore
$täyte = 'mansikka'; // valid; 'ä' is (Extended) ASCII 228
//$this = 'no!';

$interpolationResult = "var is {$var}";
$concatenationResult = $interpolationResult . "," . $Var . "!";
var_dump($interpolationResult);
var_dump($concatenationResult);