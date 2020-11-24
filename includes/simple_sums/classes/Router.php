<?php
/**
 * Router.php
 *
 * PHP program to perform simple calculations
 *
 * Maps the user-sourced route name to an internal route name
 * Then calls the relevant Controller class via a container function
 *
 * If the class definition file is not found, the Error class is invoked
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */
class Router
{
    private $route_in;
    private $route;
    private $html_output;

    public function __construct()
    {
        $this->route_in = '';
        $this->route = '';
        $this->html_output = '';
    }

    public function __destruct(){}

    /**
     * Validate the route name, call the relevant controller
     * and apply final html processing options
     */
    public function routing()
    {
        $html_output = '';

        $this->setRouteName();
        $route = $this->validateRouteName();

        if ($route == true)
        {
            $html_output = $this->selectController();
        }
        $this->html_output = $this->processOutput($html_output);
    }

    /**
     * make the resulting HTML available
     * @return string
     */
    public function getHtmlOutput()
    {
        return $this->html_output;
    }

    /**
     * route name defaults to 'index' unless an alternative is received via HTTP from the client
     */
    private function setRouteName()
    {
        if (isset($_POST['route']))
        {
            $route_in = $_POST['route'];
        }
        else
        {
            if (isset($_GET['route']))
            {
                $route_in = $_GET['route'];
            }
            else
            {
                $route_in = 'index';
            }
        }
        $this->route_in = $route_in;
    }

    /**
     * Check to see that the route name passed from the client is valid.
     * If not valid, chances are that a user is attempting something malicious.
     * In which case, kill the app's execution.
     */
    private function validateRouteName()
    {
        $route_exists = false;
        $route_to_check = $this->route_in;
        $validate = Factory::buildObject('Validate');
        $route_exists = $validate->validateRoute($route_to_check);
        return $route_exists;
    }

    /**
     * Select the relevant Controller class
     */
    public function selectController()
    {
        $controller = null;
        switch ($this->route_in)
        {
            case 'index':
                $controller = Factory::buildObject('FormController');
                break;
            case 'display-result':
                $controller = Factory::buildObject('ResultController');
                break;
            default:
                $controller = Factory::buildObject('ErrorController');
        }

        $controller->createOutput();
        $html_output = $controller->getHtmlOutput();
        return $html_output;
    }

    /**
     * facilitate final optimisation processes
     *
     * @param $html_output
     * @return
     */
    private function processOutput($html_output)
    {
        $output_processor = Factory::buildObject('ProcessOutput');
        $processed_output = $output_processor->processOutput($html_output);
        return $processed_output;
    }
}
