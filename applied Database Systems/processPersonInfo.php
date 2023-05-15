<?php
//bring in the class definitions,
require('page.inc.php');
require('person.inc.php');
//get the params sent by the form
$name = $_POST['name'];
$age = $_POST['age'];
//create a new page object
$page = new Page("Registration confirmation");
//check that input params ok
if (empty($name) || empty($age)) {
    $page->content = '<p> Name or age not entered!! Try again</p>';
    $page->display();
    exit;
}
//create a new person with these properties
$dummy = new Person();
$dummy->name = $name;
$dummy->age = $age;
//set the content: the confirmation message returned by the processPerson
//method for this person; all work is done inside processPerson
$page->content = $dummy->processPerson();
//display the page
$page->display();


echo '<p><input type="button" onclick="location.href=\'readPearsonsInfo.php\'" value="Ver personas"/></p>';
echo '<p><input type="button" onclick="location.href=\'form.html\'" value="Regresar"/></p>';
?>