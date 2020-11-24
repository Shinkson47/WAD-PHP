<?php
/**
 * Created by PhpStorm.
 * User: cfi
 * Date: 13/03/16
 * Time: 14:50
 */

/**
 * This autoloader function only works when all the class definition files are in the directory
 * defined in CLASS_PATH
 *
 * CLASS_PATH is defined in the settings.php file
 */

spl_autoload_register(function ($class_name)
{
    $file_path_and_name = '';

    $file_name = $class_name . '.php';

    $file_path_and_name = CLASS_PATH . $file_name;

    require_once $file_path_and_name;
});
