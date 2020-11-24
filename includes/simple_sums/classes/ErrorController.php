<?php
/**
 * ErrorController.php
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package crypto-show
 */

class ErrorController
{
    private $html_output;
    private $error_type;
    private $output_error_message;

    public function __construct()
    {
        $this->html_output = '';
        $this->error_type = '';
        $this->output_error_message = '';
    }

    public function __destruct(){}

    public function getHtmlOutput()
    {
        return $this->html_output;
    }

    public function setErrorType($error_type)
    {
        $this->error_type = $error_type;
    }

    public function processError()
    {
        $error = Factory::buildObject(ErrorModel);
        $database = Factory::buildObject('DatabaseWrapper');
        $database->connectToDatabase();

        $error->setErrorType($this->error_type );
        $error->selectErrorMessage();
        $error->logErrorMessage();

        $error_message = $error->getErrorMessage();
        $this->output_error_message = $error_message;

    }

    public function createOutput()
    {
        $error = Factory::buildObject('ErrorView');
        $error->setErrorMessage($this->output_error_message);
        $error->createErrorMessage();
        $error_message = $error->getHtmlOutput();
        return $error_message;
    }

}

