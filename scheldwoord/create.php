<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// database connection will be here
// include database and object files

include_once '../config/database.php';
include_once '../objects/scheldewoord.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object 
$scheldewoord = new scheldewoord($db);

// Filling data
// // welcome data from form
// $scheldewoord->set_id($_POST['id']);
$scheldewoord->set_woord($_POST['woord']);
$scheldewoord->set_Goedgekeurd($_POST['Goedgekeurd']);
$scheldewoord->set_Gradatie_scheldwoord($_POST['Gradatie_scheldwoord']);

// Run query
echo $scheldewoord->create($scheldewoord);
