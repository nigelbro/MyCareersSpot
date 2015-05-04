<?php
require_once 'functions.php'; //database with country and states tables

$result =queryMySQL("SELECT name FROM country");
$countries = array();

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
array_push($countries , $row['name']);

}

echo json_encode($countries);

?>
