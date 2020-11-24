<?php
/**
 * FormController.php
 *
 * PHP program to perform simple calculations
 *
 * class to control the creation and delivery of the form that allows
 * the user to enter values and operator
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class FormController
{
    private $html_output;

    public function __construct()
    {
        $this->html_output = '';
    }

    public function __destruct(){}

    public function getHtmlOutput()
    {
        return $this->html_output;
    }

    public function createOutput()
    {
        $form_view = Factory::buildObject('FormView');
        $form_view->createForm();
        $this->html_output = $form_view->getHtmlOutput();
    }
}
