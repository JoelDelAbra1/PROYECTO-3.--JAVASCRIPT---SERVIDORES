<?php

/* define a class Person with name and age */

class Person
{
    private $name;
    private $age;

//constructor
    public function __construct()
    {
    }
//default set function invoked when the private fields are set
//this is a good place to do sanity/security checks
    public function __set($varName, $varValue)
    {
        $varValue = trim($varValue);
        $varValue = strip_tags($varValue);

        //Esta funcion ya no esta en esta version de PHP ;(

        // if (!get_magic_quotes_gpc()){
        $varValue = addslashes($varValue);
        // }
        $this->$varName = $varValue;
    }

//default get function - nothing special for now
    public function __get($varName)
    {
        return $this->$varName;
    }

    //return a string that contains the HTML code to get data for a person
    public static function getPersonAttributesAsHTMLInput()
    {
        $myString = '<p><label>Enter your name: <input type="text" 
name="name"/></label></p>
<p><label>Enter your age: <input type="text" name="age" 
/></label></p>';
        return $myString;
    }

//process the person info to insert to file and display confirmation
    public function processPerson()
    {
//write this person to the default file
        $success = $this->insertToFile();
//return a confirmation message
        if ($success) {
            $confirmation = '<h1>Thank you for registering with our 
site</h1>' .
                '<p>The information recorded is as follows: <br 
/>' .
                "Name: $this->name <br /> Age: $this->age </p>";
        } else {
            $confirmation = '<h1>Error: we had problems with your 
registration (probably some file error - permissions??).
Please try again.</h1>';
        }
        return $confirmation;
    }

    /* save the content to a specified file
or "persons.txt" if nothing is specified */
    private function insertToFile($fileName = "persons.txt")
    {
        $fp = @fopen($fileName, 'a');
        if (!$fp) {
            return false;
        } else {
            $text = "$this->name\t$this->age\n";
            fwrite($fp, $text);
            fclose($fp);
            return true;
        }
    }

    /*read all info from file and return it in some nice format */
    public static function getAllPersonsInfo($fileName = "persons.txt")
    {

//read the data from file and construct the content
        $fp = @fopen($fileName, 'r');
//check for errors
        if (!$fp) {
            $content = "<p>ERROR! Could not open file $fileName for 
reading.</p>";
        } //if everything OK, read the file
        else {
            $content = '<p>Here is the list: <br />';
//read one line
            $line = fgets($fp);
            while (!feof($fp)) {
//process the line
                $content .= $line . '<br />';
//read next line
                $line = fgets($fp);
            }
            $content .= '</p>';
//close the file
            fclose($fp);
        }
        return $content;
    }
} ?>