<?php
/**
 * WebPageTemplateView.php
 *
 * PHP program to perform simple calculations
 *
 * parent output class - extended by each route class.
 *
 * NB methods would normally be set to final unless they need to be
 * overridden in the child class
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class WebPageTemplateView
{
    protected $page_title;
    protected $html_page_content;
    protected $html_page_output;

    public function __construct()
    {
        $this->page_title = '';
        $this->html_page_content = '';
        $this->html_page_output = '';
    }

    public final function __destruct(){}

    public final function createWebPage()
    {
        $this->createWebPageMetaHeadings();
        $this->insertPageContent();
        $this->createWebPageFooter();
    }

    public final function insertPageContent()
    {
        $this->html_page_output .= $this->html_page_content;
    }

    public final function createWebPageMetaHeadings()
    {
        $css_filename = CSS_PATH . CSS_FILE_NAME;
        $html_output = <<< HTML
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta name="Author" content="Clinton Ingrams" >
	    <title>$this->page_title</title>
	    <link rel="stylesheet" href="$css_filename" type="text/css" >
	</head>
	<body>
HTML;
        $this->html_page_output .= $html_output;
    }

    public final function createWebPageFooter()
    {
        $html_output = <<< HTML
</body>
</html>
HTML;
        $this->html_page_output .= $html_output;
    }
}
