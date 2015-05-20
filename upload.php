<?php
require_once 'mycareerspot.php';
require_once 'functions.php';
$result = queryMysql("SELECT * FROM job_seekers WHERE Email='$email'");

if (isset($_FILES['image']['name']))
  {
$target_path = "images/";
$target_file = $target_path."nigel.jpg";


    $image = $target_file;
move_uploaded_file($_FILES['image']['tmp_name'], $image);

    $typeok = TRUE;
queryMysql("UPDATE job_seekers SET image='$image' where Email='$email'");
header('location: mycareerspot.php');
    }
?>
