<?php
//bring in the class definitions,
//so we can use them
require('page.inc.php');
require('person.inc.php');
//get the input params (from URL)
if (isset($_GET['filename'])) {
    $fileName = $_GET['filename'];
} else {
    $fileName = "persons.txt";
}
//create a new page object
$page = new Page("Persons list");
//set the content: the confirmation message returned by the
//processPerson method for this person
//all work is done inside getAllPersonsInfo
$page->content = Person::getAllPersonsInfo($fileName);
//display the page
$page->display();

echo $boton = '<p><input type="button" onclick="location.href=\'form.html\'" value="Regresar"/></p>';
?>