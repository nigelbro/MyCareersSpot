<?php
require_once 'functions.php';
session_start();

if (isset($_SESSION['email']))
{
        $email     = $_SESSION['email'];
        $loggedin = TRUE;
        $emailstr  = " ($email)";
}
else $loggedin = FALSE;
if($loggedin){

        $result = queryMysql("SELECT * FROM job_seekers WHERE Email='$email'");
        $rows = $result->num_rows;

        for($j = 0;$j<$rows;++$j){
                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_NUM);
                $first_name = ucwords($row[0]);
                if(!$row[15]){

                $image = "images\defaultprofilepicture.jpg";
        }else{
                $image = $row[15];
        }
        }

        echo <<<_END
                <!DOCTYPE html>
                <html lang="en" >

                <head>


                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>MyCareersSpot</title>
                <!-- Bootstrap -->
                <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script src="perfectscrollbar/src/perfect-scrollbar.js"></script>
                <link href="perfectscrollbar/src/perfect-scrollbar.css" rel="stylesheet">
                <script>

                $(document).ready(function () {
                                "use strict";
                                $('#suppressscrollX').perfectScrollbar({suppressScrollX: true});
                                });
        </script>
	<script>
function loadXMLDoc()
{
var xmlhttp;
var emailaddress;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	document.getElementById("qapply").innerHTML = "Applied";
    }
  }
var emailaddress = document.getElementById("qapply").getAttribute("email");
console.log(emailaddress);
xmlhttp.open("GET","quickApply.php?email=" + emailaddress,true);
xmlhttp.send();
}
</script>	
	
                </head>

                <body style="background-color: #ffffff">

                <div class="container-fluid" style="background-color:000000">
                <div class="jumbotron" style="color:#000000;text-align:center;background-image:url('images/mycareersbackground.png');background-repeat:no-repeat">
                <div style="width:510px;text-align:left">

                <img  src="images/logo.png" width="500px" height="100px"alt="MyCareersSpot | Your Career . Your Way">

                </div>
                <h1> Your Career . Your Way </h1>
                <h3> Find Careers, Internships, and Volunteer Opportunities </h3>
                </div>
                <div class="row " style=";background-color:#160EEC;width:99%;margin-left:auto;margin-right:auto" >

                <div  class="col-xs-12 col-sm-12 col-md-12" style="border-style:solid;border-color:#000000" >

                <div class="col-xs-2 col-sm-2 col-md-2"style="float:right;margin-top:10px" >
                <figure>
                <img id="img" class="img-thumbnail"src='$image' width="200px" height="200px" alt="Upload Photo">
                <figcaption style="width:100px;position:relative;bottom:200px"><button  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"style="background-color:transparent;border-style:none" >
                <span  class="glyphicon glyphicon-camera" style="font-size:30px;font-weight:oblique;opacity:.7" ></span>
                </button></figcaption>
                </figure>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10"style="margin-top:150px" >
                <div class="col-xs-6 col-sm-6 col-md-8" style="margin-left:200px" >
                <ul  class="nav nav-tabs" style="font-size:26px;border-style:none" >
                <li role="presentation" class="dropdown" >
                <a style="color:#ffffff"class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                Resumes <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" style="font-size: 20px" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="resumemanagement.php">Upload Resumes</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href=""resumemanagement.php">Edit Resumes</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href=""resumemanagement.php">Delete Resumes</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Resume Help</a></li>
                </ul>
                </li>
                <li role="presentation" class="dropdown">
                <a style="color:#ffffff"class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                Cover Letters <span class="caret"></span>
                </a>
                <ul class="dropdown-menu"style="font-size: 20px" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Upload Cover Letters</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit Letters</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete Cover Letters</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Cover Letter Help</a></li>
                </ul>
                </li>

                <li role="presentation" ><a style="color:#ffffff" href="#">Portfolio Builder</a></li>
                <li role="presentation"><a style="color:#ffffff" href="mycareerspot.php">CareersSpot</a></li>

                </ul>
                </div>

                <div style="float:right;"class="col-xs-2 col-sm-2 col-md-2"  >
                <ul  class="nav nav-tabs" style="font-size:26px;border-style:none;margin-left:80px" >
                <li role="presentation"> <a style="text-decoration:none;color:#ffffff"href="logout.php">Sign Out</a></li>
                </ul>
                </div>
                </div>
                </div>
                </div>
<!--THIS IS THE START OF THE QUERY FORM -->
                <div class="row" style="margin-top:30px">
                <div class="col-md-12 col-xs-12 col-sm-12" style="text-align:center">
                <form class="form-inline"  method='post' action='mycareerspot.php' id='search' >
                <div class="form-group input-group-lg" style="text-align:left" >
                <!--<label  for="majors" style="font-size:18px">Major/Career Area</label><br>-->
                <input  class="form-control " type="text"  style="width:400px"id="majors" required form='search' name='majors' placeholder="Start Typing A Major/Career Area">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" class="form-control"  style="width:200px"required id="city" name='city' form='search' placeholder="Choose a City">
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" class="form-control" required style="width:200px" id="state" name='state' form='search' placeholder="Choose a State">

                </div>

                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div class="form-group">
                <button type="button" style="height=30px;background-color:#0080FF"class="btn btn-default">
                <ul  class="nav nav-tabs" class="form-control" style="font-size:18px;height:30px;border-style:none;"">
                <li role="presentation" class="dropdown">
                <p style="color:#ffffff"class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                Select a Search <span class="caret"></span>
                </p>
                <ul class="dropdown-menu"style="font-size: 20px" role="menu">
                <li role="presentation"><input type="submit"  role="menuitem" name='careers' tabindex="-1" form='search'style="width:100%;background-color:#0080FF"class="btn btn-primary btn-lg " value="Careers"></li>
                <li role="presentation"><input type="submit"role="menuitem" tabindex="-1"form='search'name='internships' style="width:100%;background-color:#0080FF" class="btn btn-primary btn-lg "value="Internships"></li>
                <li role="presentation"><input type="submit"  role="menuitem" tabindex="-1"form='search' name='volunteer' style="width:100%;background-color:#0080FF" class="btn btn-primary btn-lg" value="Volunteer"></li>

                </ul>
                </li>
                </ul>
                </button>
                </div>
                </div>
                </form>
                </div>
                </div>

<!-- END OF QUERY FORM -->
               
                </div>


                <!--UPLOAD PROFILE PICTURE MODAL-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload Profile Image</h4>
                </div>
                <div class="modal-body">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="image" size="14" id="fileToUpload">
                <input type="submit" value="Upload Image">
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>

                <!--END-->
		         <div class="container-fluid" style="background-color:000000">
<!-- THIS WILL HOLD THE JOBS AND RECENT SUBMISSION INFORMATION INCLUDING JOB SPECIFIC INFORMATION-->
                <div class="row" style="width:95%;margin-left:auto;margin-right:auto" >
   <div class="col-xs-2 col-sm-2 col-md-2" style="position:absolute;margin-left:90px;left:80px;width:20%;margin-top:45px;height:750px;overflow:hidden">
  </div>

                <div class="row" id="suppressscrollX" style="border-style:solid;height:750px;overflow:hidden;position:relative;left:80px;margin-top:45px;width:90%;margin-left:10px;z-index:1;border-color:#000000">
_END;

if(isset($_POST['careers']) && isset($_POST['majors']) && isset($_POST['city']) && isset($_POST['state'])){
$major = sanitizeString($_POST['majors']);
$city = sanitizeString($_POST['city']);
$state = sanitizeString($_POST['state']);
$jobs_list= queryMysql("SELECT jobs.date_posted, jobs.job_title,jobs.job_category,jobs.short_job_description,jobs.company, college_majors.Name, cities.city,cities.state_code ,jobs.recruiter_hr_contact,FROM jobs LEFT JOIN cities ON jobs.city = cities.id LEFT JOIN college_majors ON jobs.major = college_majors.major_id LEFT JOIN states_provinces ON cities.state_code = states_provinces.state_prov WHERE college_majors.Name LIKE '%$major%'  AND (states_provinces.state_prov LIKE '%$state%' OR states_provinces.code LIKE '$state') AND cities.city LIKE '%$city%' ORDER BY date_posted DESC LIMIT 9");

$job_rows = $jobs_list->num_rows;

        for($j = 0;$j<$job_rows;++$j){
                $jobs_list->data_seek($j);
                $job = $jobs_list->fetch_array(MYSQLI_NUM);
$time = strtotime($job[0]);
$email = $job[8];
echo $email;
               echo '<div id="job"class="row col-xs-10 col-sm-10 col-md-9" style="font-family:sans-serif;z-index:1;position:relative;right:15px;border-style:solid;border-color:#000000;height:250px;float:right">
                <div style="float:left;width:80%"> <h2 id="jobTitle">'.$job[1].'</h2>
                <h4 id="location">'.$job[6].",".$job[7].'
                <h4 id="company"> '.$job[4].'</h4>
                <p style="font-size:18px" id="short-jobdescription">'.$job[3].'</p>
                <p class="posted" style="color:#160EEC;font-size:16px">posted on '.date("m/d/Y",$time).'</p></div>
<button type="button"id="qapply" email="'.$job[8].'" onclick="loadXMLDoc()" class="btn btn-primary btn-lg active" style="position:relative;top:80px;background-color:#160EEC">Quick Apply</button><br>
<button type="button" class="btn btn-primary btn-lg active" style="position:relative;top:100px;background-color:#160EEC">Add to Favorites</button>
   
		  </div>';



        }

}elseif (isset($_POST['internships']) && isset($_POST['majors']) && isset($_POST['city']) && isset($_POST['state'])){
$major = sanitizeString($_POST['majors']);
$city = sanitizeString($_POST['city']);
$state = sanitizeString($_POST['state']);
$jobs_list= queryMysql("SELECT internships.date_posted, internships.intern_title,internships.intern_category,internships.short_position_description,internships.company, college_majors.Name, cities.city,cities.state_code FROM internships LEFT JOIN cities ON internships.city = cities.id LEFT JOIN college_majors ON internships.major = college_majors.major_id LEFT JOIN states_provinces ON cities.state_code = states_provinces.state_prov WHERE college_majors.Name LIKE '%$major%'  AND (states_provinces.state_prov LIKE '%$state%' OR states_provinces.code LIKE '$state') AND cities.city LIKE '%$city%' ORDER BY date_posted DESC LIMIT 9");

$job_rows = $jobs_list->num_rows;

        for($j = 0;$j<$job_rows;++$j){
                $jobs_list->data_seek($j);
                $job = $jobs_list->fetch_array(MYSQLI_NUM);
$time = strtotime($job[0]);
               echo '<div id="job"class="row col-xs-10 col-sm-10 col-md-9" style="font-family:sans-serif;z-index:1;position:relative;right:15px;border-style:solid;border-color:#000000;height:250px;float:right">
             <div style="float:left;width:80%">
		 <h2 id="jobTitle">'.$job[1].'</h2>
                <h4 id="location">'.$job[6].",".$job[7].'
                <h4 id="company"> '.$job[4].'</h4>
                <p style="font-size:18px" id="short-jobdescription">'.$job[3].'</p>
                <p class="posted" style="color:#160EEC;font-size:16px">posted on '.date("m/d/Y",$time).'</p></div>
<button type="button" id="qapply" onclick="loadXMLDoc()"  class="btn btn-primary btn-lg active"  style="position:relative;top:80px;background-color:#160EEC">Quick Apply</button><br>
<button type="button" class="btn btn-primary btn-lg active" style="position:relative;top:100px;background-color:#160EEC">Add to Favorites</button>

                </div>';



        }

}else{

$jobs_list= queryMysql("SELECT jobs.date_posted, jobs.job_title,jobs.job_category,jobs.short_job_description,jobs.company, cities.city,cities.state_code,jobs.recruiter_hr_contact FROM jobs LEFT JOIN cities ON jobs.city = cities.id LEFT JOIN states_provinces ON cities.state_code = states_provinces.state_prov  ORDER BY date_posted DESC LIMIT 9");
        $job_rows = $jobs_list->num_rows;

        for($j = 0;$j<$job_rows;++$j){
                $jobs_list->data_seek($j);
                $job = $jobs_list->fetch_array(MYSQLI_NUM);
$time = strtotime($job[0]);
 echo '<div id="job"class="row col-xs-10 col-sm-10 col-md-9" style="font-family:sans-serif;position:relative;right:15px;z-index:1;border-style:solid;border-color:#000000;height:250px;float:right">
                 <div style="float:left;width:80%"><h2 id="jobTitle">'.$job[1].'</h2>
                <h4 id="location">'.$job[5].",".$job[6].'
                <h4 id="company"> '.$job[4].'</h4>
                <p style="font-size:18px" id="short-jobdescription">'.$job[3].'</p>
                <p class="posted" style="color:#160EEC;font-size:16px">posted on '.date("m/d/Y",$time).'</p></div>
<button type="button" id="qapply" email="'.$job[7].'" onclick="loadXMLDoc()" class="btn btn-primary btn-lg active"  style="position:relative;top:80px;background-color:#160EEC">Quick Apply</button><br>
<button type="button" class="btn btn-primary btn-lg active"  style="background-color:#160EEC;position:relative;top:100px">Add to Favorites</button>

                </div>';

         	      

        }
}
echo <<<_END
                </div>


                </div>
                <!-- END -->
                </div>
                <script src="bootstrap/js/bootstrap.min.js"></script>

                </body>

                </html>



_END;
}
?>

