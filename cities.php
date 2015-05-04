<?php

require_once 'functions.php';
if (isset($_GET['state_prov']))
{

$state = $_GET['state_prov'];


$result = queryMySQL("SELECT city  FROM cities INNER JOIN states_provinces ON cities.state_code= states_provinces.state_prov  WHERE state_prov LIKE '$state'");
$cities =  array();
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
array_push($cities, $row['city']);
}
echo json_encode($cities);
}
?>
