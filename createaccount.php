<?php
require_once 'functions.php';
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
session_start();


 $error = $email = $password = "";
  if (isset($_SESSION['email'])) destroySession();

  if (isset($_POST['firstname'])&&
isset($_POST['lastname'])&&
isset($_POST['email'])&&
isset($_POST['state'])&&
isset($_POST['city'])&&
isset($_POST['zipcode'])&&(
isset($_POST['password']) || isset($_SESSION['access_token'])))
  {
    $email = sanitizeString($_POST['email']);
  
$fname =sanitizeString($_POST['firstname']);
$lname =sanitizeString($_POST['lastname']);
$country = sanitizeString($_POST['country']);
$state = sanitizeString($_POST['state']);
$city = sanitizeString($_POST['city']);
$zipcode = sanitizeString($_POST['zipcode']);
$email = sanitizeString($_POST['email']);
if(isset($_SESSION['access_token'])){
  $token = $_SESSION['access_token'];
}else{
$password = sanitizeString($_POST['password']);
$salt1 = "Qk$!N";
$salt2 = "BF)^32!";
$token = hash('ripemd128', "$salt1$password$salt2");
}

    if ( $password == "" && $token == ""){
      $error = "Not all fields were entered<br><br>";
  }
    else
    {
      $result = queryMysql("SELECT * FROM job_seekers WHERE email='$email'");

      if ($result->num_rows){
        $error = "That email address already exists<br><br>";
 
    }

      else
      {
        queryMysql("INSERT INTO job_seekers (FirstName,LastName,Country,City,State,ZipCode,Email,Password)VALUES('$fname','$lname','$country','$city','$state','$zipcode','$email','$token')");
        $_SESSION['email'] = $_POST['email'];
        header('location: mycareerspot.php');
      }
  }
 }
  
echo $error;

?>

