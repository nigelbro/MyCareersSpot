<?php // Example 26-7: login.php
require_once 'functions.php';
session_start();

if (isset($_POST['email']))
  {
    $email = sanitizeString($_POST['email']);
    $pass = sanitizeString($_POST['password']);
    $salt1 = "Qk$!N";
    $salt2 = "BF)^32!";
    $token = hash('ripemd128', "$salt1$pass$salt2");
    if ($email == "" || $pass == ""){
        $error = "Not all fields were entered<br>";
    }else
    {

      $result = queryMySQL("SELECT Email,Password FROM signup
        WHERE Email='$email' AND Password='$token'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
        echo $error;
      }
      else
      {
        $_SESSION['email'] = sanitizeString($_POST['email']);
       header('location: mycareerspot.php');
        
}
}
}







?>

