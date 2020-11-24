<?php
/**
 * ResultController.php
 *
 * PHP program to perform simple calculations
 *
 * class to control the validation/sanitisation of the user entered values
 * perform the calculation the deliver the result to the client
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class ResultController
{
    private $html_output;
    private $sanitised_input;
    private $page_content;

    public function __construct()
    {
        $this->html_output = '';
        $this->sanitised_input = array();
        $this->page_content = array();
    }

    public function __destruct(){}

    public function getHtmlOutput()
    {
        return $this->html_output;
    }

    public function createOutput()
    {
        $this->validateInput();
        $this->processInputValues();
        $this->createHtmlOutput();
    }

    public function validateInput()
    {
        $validate_result = Factory::buildObject('Validate');
        $tainted = $_POST;
        $value_1 = $tainted['calculation'][1];
        $value_2 = $tainted['calculation'][2];
        $calculation_type = $tainted['calculation'][3];

        $this->sanitised_input['sanitised-value-1'] = $validate_result->validateInteger($value_1);
        $this->sanitised_input['sanitised-value-2'] = $validate_result->validateInteger($value_2);
        $this->sanitised_input['sanitised-calculation-type'] = $validate_result->validateCalculationType($calculation_type);
        $this->sanitised_input['validate-error'] = true;

        if ($this->sanitised_input['sanitised-value-1'] !== false
            && $this->sanitised_input['sanitised-value-2'] !== false
            && $this->sanitised_input['sanitised-calculation-type'] !== false
        )
        {
            $this->sanitised_input['validate-error'] = false;
        }
    }

    public function processInputValues()
    {
        $page_content = [];
        $result_model = Factory::buildObject('ResultModel');
        $result_model->setValues($this->sanitised_input);
        $result_model->calculation();
        $result_model->storeUserData();

        $calculation_result = $result_model->getCalculationResult();

        $page_content['calculation-result'] = $calculation_result;
        $page_content['validation-result'] = $this->sanitised_input;
        $this->page_content = $page_content;
    }

    public function createHtmlOutput()
    {
        $result_view = Factory::buildObject('ResultView');
        $result_view->setOutputValues($this->page_content);
        $result_view->createOutputPage();
        $this->html_output = $result_view->getHtmlOutput();
    }
}
