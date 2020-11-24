<?php
/**
 * Validate.php PHP program to perform simple calculations
 *
 * class to validate & sanitise the user entered values
 * returns an error flag if there was a problem
 *
 * NB the values entered by the user are passed as an array
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class Validate
{
    public function __construct() {}

    public function __destruct() {}

    /**
     * Check that the route name from the browser is a valid route
     * If it is not, abandon the processing.
     * NB this is not a good way to achieve this error handling.
     *
     * @param $route
     * @return boolean
     */
    public function validateRoute($route)
    {
        $route_exists = false;
        $routes = ['index', 'display-result'];

        if (in_array($route, $routes))
        {
            $route_exists =  true;
        }
        else
        {
            die();
        }
        return $route_exists;
    }

    /**
     * Tests that every character in the entered string is a digit.  If  returns false
     * @param $value
     * @return bool|int
     */
    public function validateInteger($value)
    {
        $sanitised_integer = false;
        if (ctype_digit(($value)))
        {
            $sanitised_integer = (int)filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        }
        return $sanitised_integer;
    }

    public function validateCalculationType(string $type_to_check)
    {
        $found = false;
        $calculation_type = ['addition', 'subtraction', 'multiplication', 'division'];

        if (in_array($type_to_check, $calculation_type))
        {
            $found = $type_to_check;
        }
        return $found;
    }

}
