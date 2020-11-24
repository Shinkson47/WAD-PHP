<?php
/**
 * FormView.php
 *
 * PHP program to perform simple calculations
 *
 * class to create the client form
 *
 * extends the web page template class to give a standard page layout
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class FormView extends WebPageTemplateView
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createForm()
    {
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
        $this->page_title = 'Calculation Form';
    }

    private function createPageBody()
    {
        $address = APP_ROOT_PATH;
        $page_heading = 'Simple Arithmetic';
        $page_heading_2 = 'Enter values and select calculation type';
        $html_output = <<< HTMLFORM
<h2>$page_heading</h2>
<h3>$page_heading_2</h3>
<form action="$address" method="post">
<fieldset>
	<label for="val1">Value 1: </label><input id="val1" type="text" name="calculation[1]" size="10" >
	<label for="val2">Value 2: </label><input id="val2" type="text" name="calculation[2]" size="10" >
	<br><br>
	<p>Select calculation type:</p>
	<input type="radio" name="calculation[3]" value="addition" checked="checked" >Add
	<input type="radio" name="calculation[3]" value="subtraction" >Subtract
	<input type="radio" name="calculation[3]" value="multiplication" >Multiply
	<input type="radio" name="calculation[3]" value="division" >Divide
	<hr>
	<input type="reset" value="Clear all values" >
	<br>
	<button name="route" value="display-result">Calculate</button>
	<br>
	<button name="route" value="retrieve-data">Display Stored Information</button>
</fieldset>
</form>
HTMLFORM;

        $this->html_page_content = $html_output;
    }
}
