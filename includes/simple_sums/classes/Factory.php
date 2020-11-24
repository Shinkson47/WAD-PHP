<?php
/**
 * Factory.php
 *
 * PHP program to perform simple calculations
 *
 * Class method to instantiate all other classes
 *
 * createDatabaseWrapper could be extended to instantiate a database connection only when
 * a new object is required (singleton pattern).
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class Factory
{
    public function __construct(){}

    public function __destruct(){}

    /**
     * Static method to instantiate an object.
     *
     * NB if the Class Definition File (CDF), has not already been included,
     * the registered autoload closure will be called and executed to include
     * the CDF
     *
     * @param $class
     * @return mixed
     */
    public static function buildObject($class)
    {
        $object = new $class();
        return $object;
    }
}