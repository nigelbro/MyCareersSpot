<?php // Example 26-1: functions.php
$db_hostname = 'localhost';
$db_database = 'mycareersspot';
$db_username = 'root';
$db_password = 'LylahRose14!#';  

$connection = new mysqli($db_hostname, $db_username,$db_password , $db_database );
  if ($connection->connect_error) die($connection->connect_error);

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
   return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

  function showProfile($email)
  {
    if (file_exists("$email.jpg"))
      echo "<img src='$email.jpg' style='float:left;'>";

    
  }
?>
