<?php
session_start();
require_once 'functions.php';
if(isset($_SESSION['email'])){

destroySession();
header('location: home.php');




}






?>
