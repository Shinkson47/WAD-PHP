<?php
/**
 * ResultView.php
 *
 * PHP program to perform simple calculations
 *
 * class to create the relevant output html content, dependent upon
 * successful validation and calculation
 *
 * extends the web page template class to give a standard page layout
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class ResultView extends WebPageTemplateView
{
    private $page_content;
    private $calculation_result_message;

    public function __construct()
    {
        parent::__construct();
        $this->page_content = array();
        $this->calculation_result_message = '';
    }

    public function setOutputValues($page_content)
    {
        $this->page_content = $page_content;
    }

    public function createOutputPage()
    {
        $this->getCalculationResultMessage();
        $this->setPageTitle();
        $this->createPageBody();
        $this->createWebPage();
    }

    public function getHtmlOutput()
    {
        return $this->html_page_output;
    }

    private function setPageTitle()
    {
        $this->page_title = 'Calculation result...';
    }

    private function getCalculationResultMessage()
    {
        $result_message = '';
        if ($this->page_content['validation-result']['validate-error'])
        {
            $result_message = 'Oooops -  there was a problem with the value(s) that you entered.  Please try again';
        }
        else
        {
            $value_1 = $this->page_content['validation-result']['sanitised-value-1'];
            $value_2 = $this->page_content['validation-result']['sanitised-value-2'];
            $calculation_type_message = $this->page_content['calculation-result']['calculation_type_message'];
            $result = $this->page_content['calculation-result']['calculation-result'];
            $result_message = $calculation_type_message . ' ' . $value_1 . ' and ' . $value_2 . ' gives ' . $result;
        }
        $this->calculation_result_message = $result_message;
    }

    private function createPageBody()
    {
        $client_port = $_SERVER['REMOTE_PORT'];
        $client_ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $server_signature = $_SERVER['SERVER_SOFTWARE'];
        $address = APP_ROOT_PATH;
        $page_heading = 'Simple Arithmetic';
        $page_heading_2 = 'Calculation Result';
        $result_message = $this->calculation_result_message;
        $html_output = <<< HTML
<h2>$page_heading</h2>
<h3>$page_heading_2</h3>
<p>$result_message</p>
<p><i>User agent: $user_agent</i></p>
<p><i>Client port number: $client_port</i></p>
<p><i>Client ip address: $client_ip</i></p>
<p><i>Server details: $server_signature</i></p>
<p><a href="$address">Try again</a></p>
HTML;
        $this->html_page_content = $html_output;
    }
}
