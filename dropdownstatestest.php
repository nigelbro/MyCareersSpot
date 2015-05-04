<?php
require_once 'functions.php';
if (isset($_GET['name']))
{


$name = $_GET['name'];

$result= queryMySQL( "SELECT state_prov FROM states_provinces INNER JOIN country ON states_provinces.country = country.name WHERE name LIKE '$name'");

$states =  array();

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
array_push($states, $row['state_prov']);
}
echo json_encode($states);




}


?>

