<?php


require_once 'functions.php';
require_once 'FacebookSignup.php';
if (isset($_SESSION['email']))
  {
    $email     = $_SESSION['email'];
    $loggedin = TRUE;
    $emailstr  = " ($email)";
  }
  else $loggedin = FALSE;
  if($loggedin){
print_r($_SESSION);
header('location: mycareerspot.php');



  }else{

echo <<<_END

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<style>
.dropdown-menu{


	background-color: transparent;
}
#hover{
font-size:30px;
color:#ffffff;

}


.bgchange{
opacity:.5;
filter:alpha(opacity=50);
position:absolute;
width:100%;
height:100%;
overflow:hidden;
z-index:-1

}
.bgchange img{
width:100%;
height:100%;
position:relative;

}


</style>
<!--VALIDATE INPUT CHECK IF EMAIL ALREADY EXIST -->
 <script>
    function checkUser(email)
    {
      if (email.value == '')
      {
        document.getElementById('info').innerHTML = '';
        return
      }

      params  = "email=" + email.value
      request = new ajaxRequest()
      request.open("POST", "checkemail.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              document.getElementById('info').innerHTML = this.responseText
          	
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  <!--VALIDATE INPUT END-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(document).ready(function() {


$(".bgchange img:gt(0)").hide()


setInterval(function(){
$(".bgchange :first-child").fadeOut(6000).next("img").fadeIn(3000).end().appendTo(".bgchange");}, 6000);


});
</script>

<title> EntryLeveLCareerSpot.com&nbsp &#124 &nbsp Where Experience Doesn't Matter</title>
<meta charset="utf-8" lang="en">
<meta name="keywords" content="Entry-Level, Entry Level, Jobs, Internships, High School, Senior, Seniors, No Experience,Careers, College, Masters Degree, PhD, Associates Degree, Bachelor Degree">
<meta name="description" content="Offering entry-level careers with no experience, also paid and unpaid internships for high school seniors and above">
</head>
<!--START OF BODY-->
<body style="background-color:#000000">
<div class="container-fluid">




<!--THIS IS THE LOGO--><!-- LOGO END-->
<!--THIS WILL HOLD THE SIGNIN FORM-->

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="dropdown" style="width:100%">
  
  <button  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel" type="button" style="opacity:.5;filter:alpha(opacity=50);position:relative;left:90%;background-color:transparent;border-style:none" class="btn btn-default" aria-label="Left Align">
  <span id="hover"class="glyphicon glyphicon-option-vertical" aria-hidden="true"><span style="font-size:18px">SignIn</span></span>
</button>


  <ul class="dropdown-menu"  style="left:80%;background-color:transparent;border-style:none" role="menu" aria-labelledby="dLabel">
<form action="login.php" method="post" id="signin">

    <li role="presentation"> <input  style="box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px" type="email" name='email' placeholder="Email Address" required="required" form="signin">   </li><br>
    <li role="presentation"><input style="box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px" type="password" name='password' placeholder="Password" required="required" form="signin"> </li><br>
    <li role="presentation"> <input style="font-size:18px" type="submit" value="Sign In" ></li>
</form>
  </ul>
</div>
</div>
</div>





<!--This will be the background fadein/out slideshow START-->
<div  style="z-index:-1;position:absolute;top:0px;left:0px;background-color:#000000;width:100%;height:100%">
	<div class="bgchange"  >
		<img src="images/sunset.jpg" alt="">
		<img src="images/soter.jpg" alt=""  >
		<img src="images/science.jpg"  alt="">
		<img src="images/datacenter.jpg" alt="">
		<img src="images/sounddesign.jpg" alt=""  >
		<img src="images/photography.jpg" alt=""  >
		<img src="images/construction.jpg" alt="" >
	</div>
	<!--SIGNUP FORM -->
	<div style="opacity:.5;filter:alpha(opacity=50);font-size:18px;z-index:1;text-align:center;width:25%;height:400px;margin-top:5px;position:relative;margin-left:auto;margin-right:auto;top:20%">
		<form  action='signup.php' method='post' id="signup" autocomplete="off">
			<a  href='$loginUrl'><img style="margin-top:40px"src="images/fbsignup.png" width="302px" height="52" alt="Sign Up With Facebook"></a><br><br>
			<a href="LinkedInSignup.php"><img src="images/linkedinsignup.png" width="302px" height="52" alt="Sign Up With LinkedIn"></a><br><br>
			<input  style="box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px;text-transform:capitalize" type='text' name='firstname' placeholder="Enter First Name" required="required" ><br><br>
			<input  style="box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px;text-transform:capitalize" type='text' name='lastname' placeholder="Enter Last Name" required="required" ><br><br>
			<input style="box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px" type='email' name='email' id="email" placeholder="Enter Email Address" required="required" onBlur='checkUser(this)'><span style="width:400px;color:#ffffff;font-size:38px" id='info'></span><br>
	  		<input class="btn btn-primary btn-lg" style="border-style:solid;border-color:#000000;position:relative;top:20px;font-size:18px" id="signupbutton" type='submit' value='Sign Up'>
		</form>
	</div>
</div>
<div style="position:relative;top:700px;width:100%;text-align:center;z-index:2">

<img src="images/logo.png">
</div>
<!-- SLIDESHOW END-->





<!--BootStrap Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>

_END;

}


?>

