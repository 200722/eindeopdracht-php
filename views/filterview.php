<?php
include_once '../config/database.php';
include_once '../config/vars.php';
include_once '../objects/scheldewoord.php';

$database = new Database();
$db = $database->getConnection();
// initialize object 
$scheldewoord = new scheldewoord($db);

if (isset($_POST['inputTxt'])) {
    echo $scheldewoord->filter($_POST['inputTxt']);
}

?>

<form method="POST">
    <textarea name="inputTxt" cols="30" rows="10"></textarea>

    <input type="radio" name="Gradatie_scheldwoord" value="one">
    <label for="one">1</label>
    <input type="radio" name="Gradatie_scheldwoord" value="two">
    <label for="two">2</label>
    <input type="radio" name="Gradatie_scheldwoord" value="Three">
    <label for="three">3</label>
    <input type="submit" value="filter">

</form>