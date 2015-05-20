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
		<style>
		.upload-drop-zone {
 		 height: 200px;
 		 border-width: 2px;
		  margin-bottom: 20px;
		}

		/* skin.css Style*/
		.upload-drop-zone {
 			 color: #ccc;
 			 border-style: dashed;
 			 border-color: #ccc;
 			 line-height: 200px;
			  text-align: center
		}
		.upload-drop-zone.drop {
 			 color: #222;
 			 border-color: #222;
		}

		</style>
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
function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);

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
_END;

//resume drag and drop or upload form 
echo '<div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload Files</strong> <small>Bootstrap files upload</small></div>
        <div class="panel-body">

          <!-- Standar Form -->
          <h4>Select files from your computer</h4>
          <form action="resumeuploadform.php" method="post" enctype="multipart/form-data">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="resumes[]" multiple><br>
              </div>
              <input type="submit" class="btn btn-sm btn-primary" name="upload" value="Upload Resumes">
            </div>
          </form>

          <!-- Drop Zone -->
          <h4>Or drag and drop files below</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>

          <!-- Progress Bar -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              <span class="sr-only">60% Complete</span>
            </div>
          </div>

          <!-- Upload Finished -->
          <div class="js-upload-finished">
            <h3>Processed files</h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->









';
//end of resume upload/draganddrop
echo <<<_END
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

