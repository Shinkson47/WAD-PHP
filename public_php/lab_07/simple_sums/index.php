<?php
/**
 * index.php
 * PHP program to perform simple calculations
 *
 * Calculation options are add, subtract, multiply or divide.
 * Two values are entered, all entered values are sanitised and validated
 * then the appropriate output is echoed
 *
 * This version of the application is written according to the MVC pattern.
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 *
 * NB remove all testing code before uploading the application to the PHP server
 * ie, all ini_set function calls and the xdebug trace functions.
 */

//ini_set('xdebug.trace_output_name', 'calculations');
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

require_once 'simple_sums/bootstrap.php';
//
//if (function_exists(xdebug_stop_trace()))
//{
//    xdebug_stop_trace();
//}
//
//if (function_exists(xdebug_start_trace()))
//{
//    xdebug_start_trace();
//}
