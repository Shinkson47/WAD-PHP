<?php
$foo = 'Bob'; // Assign the value 'Bob' to $foo
// foo == bob.

$bar = &$foo; // Reference $foo via $bar.
// bar IS foo.

// Changing bar actually changes foo.
$bar = "My name is $bar"; // Alter $bar...

echo $bar; // Reference to foo's zval.
echo $foo; // Actual zval