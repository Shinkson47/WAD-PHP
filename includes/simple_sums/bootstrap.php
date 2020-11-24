<?php

declare(strict_types = 1);

/**
 * bootstrap.php
 * PHP program to perform simple calculations
 *
 * bootstrap includes the autorouter and settngs, then calls the Router.
 * Finally it calls the ProcessOutput class.
 *
 * It also contains the definition for the __autoload magic function
 * (http://uk1.php.net/manual/en/function.autoload.php)
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

include_once 'autoload.php';

include_once 'settings.php';

$router = Factory::buildObject('Router');
$router->routing();
$html_result = $router->getHtmlOutput();

echo $html_result;
