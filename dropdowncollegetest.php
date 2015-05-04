<?php
if (isset($_GET['city']))
{

require_once 'locationlogin.php';
$city = $_GET['city'];
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if($connection->connect_server) die($connection->connect_error);

$query = "SELECT name FROM universities INNER JOIN cities ON universities.city_name = cities.city WHERE city LIKE '$city'";

$result = $connection->query($query);
$schools =  array();

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
array_push($schools, $row['name']);
}
echo json_encode($schools);
}
?>
