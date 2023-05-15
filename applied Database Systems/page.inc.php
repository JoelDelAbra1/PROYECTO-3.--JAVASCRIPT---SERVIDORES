<?php

class Page
{
//attributes
    public $content;
    private $title;
    private $header = "<?xml version = '1.0' ?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>";

//constructor
    public function __construct($title)
    {
        $this->title = $title;
    }

//set public attributes
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

//display page
    public function display()
    {
        echo $this->header;
        echo "<head><title> $this->title </title></head>";
        echo "<body>";
        echo $this->content;
        echo "</body></html>";
    }
} //end class definition
?>