<?php

echo<<<_END
<!DOCTYPE html>
                <html lang="en" >

                <head>


                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Untitled 1</title>
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
                <link
                <link href="perfectscrollbar/src/perfect-scrollbar.css" rel="stylesheet">
                <script>

                $(document).ready(function () {
                                "use strict";
                                $('#suppressscrollX').perfectScrollbar({suppressScrollX: true});
                                });
        </script>
                </head>

                <body style="background-color: #ffffff">

                <div class="container-fluid" style="background-color:000000">
<!-- THIS WILL HOLD THE JOBS AND RECENT SUBMISSION INFORMATION INCLUDING JOB SPECIFIC INFORMATION-->
                <div class="row" style="width:95%;margin-left:auto;margin-right:auto" >

                <div class="row" id="suppressscrollX" style="border-style:solid;height:750px;overflow:hidden;position:relative;width:100%;margin-top:45px;margin-left:10px;z-index:1;border-color:#000000">
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="font-family:sans-serif;position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                <h2>Sr. Web Designer</h2>
                <h4>Hearst Digital Marketing Services</h4>
                <p style="font-size:18px">The Senior Web Designer is responsible for the design and development of advanced/custom websites. 
                 The designer will work with Web Project Coordinators, Customers and Manager to create aesthetically pleasing,
                 fully functioning websites. Best practices and design trends will be utilized to ensure the success of the projects. 
                 They will be required to have experience in graphics, layout, scripting, programming, as well as development involving 
                 compatibility and seamless integration with various technologies such as, but not limited to, HTML, CSS, PHP, JavaScript, JQuery.</p>
                <p class="posted" style="color:#160EEC;font-size:16px">posted: 2 hours ago</p>                
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job"class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                <div id="job" class="row col-xs-10 col-sm-10 col-md-10" style="position:relative;right:15px;border-style:solid;border-color:#000000;height:300px;float:right">
                </div>
                </div>

                </div>
                <!-- END -->
                </div>

                <script src="bootstrap/js/bootstrap.min.js"></script>

                </body>

                </html>

_END;
?>
