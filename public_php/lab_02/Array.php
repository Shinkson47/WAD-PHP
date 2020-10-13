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
