<?php
session_start();



if(isset($_POST['firstname']) && isset( $_POST['lastname']) && isset( $_POST['email']))
{
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
}else if(isset($_GET['firstname']) && isset( $_GET['lastname']) && isset( $_GET['email']))
{
$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$email = $_GET['email'];
}



echo <<<_END

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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$.getJSON("dropdowntest.php",  success = function(data){

var options = "";
for (var i=0; i < data.length; ++i){

options += "<option value='"+data[i].toLowerCase() + "'>" + data[i] + "</option>";


}
$("#country").append(options);
$("#country").change();
});

$("#country").change(function(){
$.getJSON("dropdownstatestest.php?name=" + $(this).val(),  success = function(data){

var options = "";
for (var i=0; i < data.length; ++i){

options +=   "<option value='"+data[i].toLowerCase() + "'>" + data[i] + "</option>";


}
$("#state").html("");
$("#state").append(options);
$("#state").change();
});


});
$("#state").change(function(){
$.getJSON("dropdowncitiestest.php?state_prov=" + $(this).val(),  success = function(data){

var options = "";
for (var i=0; i < data.length; ++i){

options +=   "<option value='"+data[i].toLowerCase() + "'>" + data[i] + "</option>";


}
$("#city").html("");
$("#city").append(options);
});


});

$("#city").change(function(){
$.getJSON("dropdowncollegetest.php?city=" + $(this).val(),  success = function(data){

var options = "";
for (var i=0; i < data.length; ++i){

options +=   "<option value='"+data[i].toLowerCase() + "'>" + data[i] + "</option>";


}
$("#college").html("");
$("#college").append(options);
});


});



});
</script>
<script>
$(document).ready(function() {
$(".bgchange img:gt(0)").hide()


setInterval(function(){
$(".bgchange :first-child").fadeOut(6000).next("img").fadeIn(3000).end().appendTo(".bgchange");}, 6000);


});
</script>
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>
<meta charset="utf-8">
<title>Sign Up </title>
</head>
<!--BODY START-->
<body style="background-color:#000000">
<!-- LOGO HEADER START -->


<!--SIGNUP FORMMMMMMMMMM STARTTTTTTT-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header" style="background-color:#8E8E8E">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" style="font-weight:bold;color:#000000;font-size:18px;">Complete Signup</h4>
        </div>
      </div>
      
      <div class="modal-body" style="background-color:#8e8e8e;font-weight:bold;color:#000000;font-size:18px;">
    
    <div class="row" >
      <div class="col-xs-6 col-sm-6 col-md-6" style="float:left">
      <form id="signup" method='POST' action='createaccount.php'>
        First Name<br> <input  style="box-shadow:5px 5px 5px #000000;width:250px;font-size:18px;border-style:solid;border-color:#000000;text-transform:capitalize" type='text' name='firstname' value=" $fname "><br>
		Last Name<br> <input   style="box-shadow:5px 5px 5px #000000;width:250px;font-size:18px;border-style:solid;border-color:#000000;text-transform:capitalize" type='text' name='lastname' value="$lname" ><br>
		Email Address<br> <input  style="box-shadow:5px 5px 5px #000000;width:250px;border-style:solid;border-color:#000000;font-size:18px" type='email' name='email' value='$email'><br>
		Select Country<br> <select style="box-shadow:5px 5px 5px #000000;width:250px;border-style:solid;border-color:#000000;font-size:18px" id="country" name='country'><option style="text-transform:capitalize" value="">Select Country</option></select><br>
		Select State<br> <select style="width:250px;border-style:solid;box-shadow:5px 5px 5px #000000;border-color:#000000;font-size:18px"  id="state" name='state'><option value="">Select State</option></select><br>
		Select City<br> <select style="width:250px;box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px"  id="city" name='city'></select><br>
		Zipcode<br> <input form="signup" style="box-shadow:5px 5px 5px #000000;width:250px;border-style:solid;border-color:#000000;font-size:18px" type='text' name='zipcode' ><br>
		Create a Password<br> <input form="signup"  style="box-shadow:5px 5px 5px #000000;width:250px;border-style:solid;border-color:#000000;font-size:18px" type='password' name='password' ><br>
    </form>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
       <figure >
       <figcaption style="font-size:24px">Your Career.Your Way</figcaption>
      <img src="images/massagetherapy.jpg" width="260px" height="350px" alt="Your Career, Your Way">
      <figcaption>Todays' Career: Massage Therapy</figcaption>
      </figure>
      </div>
      </div>
      </div>
      <div class="modal-footer" style="background-color:#E9E9E9">
      <form id="signup" method='POST' action='createaccount.php'>
          <button type="button" style="position:relative;box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px"class="btn btn-default" data-dismiss="modal">Close
          </button>
          <input class="btn btn-primary" style="position:relative;box-shadow:5px 5px 5px #000000;border-style:solid;border-color:#000000;font-size:18px"  type='submit' value='Create Account' form="signup">
          </form>
      </div>
  	  
    </div>
  </div>
</div>
<!--SIGNUP FORM ENDDDDD-->



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
<div style="position:relative;top:700px;width:100%;text-align:center">

<img src="images/logo.png">
</div>
</div>
<!--BootStrap Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>





_END;





function get_post($connection, $var){
return $connection->real_escape_string($_POST[$var]);
}



?>

