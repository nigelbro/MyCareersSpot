<?php
echo <<<_END
<html>
<head>
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
});


});




});





</script>

<title> Drop Down Testing </title>
</head>
<body>
<label> Select Country </label>

<select id="country" name="country"><option value="">Select Country</option></select>
<label> Select State </label>
<select id="state" name="state"></select>



</body>
</html>
_END;



?>
