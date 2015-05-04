<?php

//define variables for OAUTH to be used 
define('API_KEY', '77xj4fdwzeyw2s');
define('KEY_SECRET', 'Ab9OrzuhG7XA8Uvi');
define('REDIRECT_URL', 'http://www.authornigelbrown.com/LinkedInSignup.php' );
define('SCOPE',  'r_fullprofile r_emailaddress r_network r_contactinfo rw_nus w_messages' );

//start the session tracking 
if(isset($_GET['code'])){

	if($_SESSION['state'] == $_GET['state']){
		requestAccessToken();
	
	}
}

else{

        if(empty($_SESSION['access_token'])){
	getAuthorizationCode();
}

}

//pull the user first name, last name, and email for the signup table fields
$user = fetch('GET', '/v1/people/~:(first-name,last-name,email-address)');
$fname = $user->firstName;
$lname= $user->lastName;
$email = $user->emailAddress;
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

function getAuthorizationCode(){
$getAuthCode = array(
'response_type'=>'code',
'client_id'=> API_KEY,
'scope'=> SCOPE,
'state'=>uniqid('',true),
'redirect_uri'=>REDIRECT_URL,
);
$Oauth_code_url ='https://www.linkedin.com/uas/oauth2/authorization?'. http_build_query($getAuthCode). "\n";

$_SESSION['state']=$getAuthCode['state'];
header("Location: $Oauth_code_url ");

exit;

}

function requestAccessToken(){

 $getAccessToken = array(
'grant_type'=>'authorization_code',
'code'=>$_GET['code'],
'redirect_uri'=>REDIRECT_URL,
'client_id'=>API_KEY,
'client_secret'=> KEY_SECRET,
);
$access_token_url = "https://www.linkedin.com/uas/oauth2/accessToken?" . http_build_query($getAccessToken);
$context = stream_context_create(
                array('http'=>
                        array('method' => 'POST',
                        )
                )
);

$access_token_url_contents =  file_get_contents($access_token_url,false,$context);
$access_token = json_decode($access_token_url_contents);
$_SESSION['access_token'] = $access_token->access_token;
$_SESSION['expires_in'] = $access_token->expires_in;
$_SESSION['expires_at'] = time() + $_SESSION['expires_in'];

return true;



}
//FUNCTION TO CALL FOR AUTHENTICATED CALLS ON THE API
function fetch($method, $resource, $body = ''){


$opts = array(
        'http'=>array(
                'method'=>$method,
                'header'=> "Authorization: Bearer " . $_SESSION['access_token']. "\r\n". "x-li-format: json\r\n")
);
$url = 'https://api.linkedin.com' . $resource;

$context = stream_context_create($opts);
$response = file_get_contents($url,false,$context);
return json_decode($response);

}

?>
