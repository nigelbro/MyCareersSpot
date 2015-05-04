<?php
require_once 'studentlogin.php';
$connection = new mysqli($db_hostname,$db_username,$db_password,$db_database);

if($connection->connect_server) die($connection->connect_error);

if(isset($_POST['delete'])&& isset($_POST['FirstName']))
{
$fname = get_post($connection, 'FirstName');
$query = "DELETE FROM signup WHERE FirstName='$fname'";
$result = $connection->query($query);
}

if(isset($_POST['FirstName'])&& 
isset($_POST['LastName'])&& 
isset($_POST['Country'])&&
isset($_POST['City'])&&
isset($_POST['State'])&&
isset($_POST['ZipCode'])&&
isset($_POST['Email'])&&
isset($_POST['Password'])&&
isset($_POST['CollegeUniversity'])&&
isset($_POST['EducationLevel'])&&
isset($_POST['Degree'])&&
isset($_POST['Major']))

{
$fname = get_post($connection, 'FirstName');
$lname = get_post($connection, 'LastName');
$country = get_post($connection, 'Country');
$city = get_post($connection, 'City');
$state = get_post($connection, 'State');
$zipcode = get_post($connection, 'ZipCode');
$email = get_post($connection, 'Email');
$college = get_post($connection, 'CollegeUniversity');
$educationlevel = get_post($connection, 'EducationLevel');
$degree = get_post($connection, 'Degree');
$major = get_post($connection, 'Major');
$phonenumber = get_post($connection, 'PhoneNumber');
$linkedinurl = get_post($connection, 'LinkedInUrl');
$portfoliolink = get_post($connection, 'PortfolioLink');
$password = get_post($connection, 'Password');
$salt1 = "Qxte@#";
$salt2 = "Ta$!";
$token = hash('ripemd128', "$salt1$password$salt2");
$query = "INSERT INTO signup VALUES('$fname','$lname','$country','$city','$state','$zipcode','$email','$college','$educationlevel','$degree','$major','$phonenumber','$linkedinurl','$portfoliolink','$token')";
$result = $connection->query($query);

if(!$result) die($connection->error);
}

echo <<<_END
  <form action="databaseselect.php" method="post" id="signup"><pre>
	First Name <input  type="text" name="FirstName"  ><br>
	Last Name <input  type="text" name="LastName" ><br>
	Phone Number <input type="text" name="PhoneNumber"><br>
	Country <input type="text" name="Country"><br>
	City <input type="text" name="City"><br>
	State <input type="text" name="State" ><br>
	Zip Code <input type="text" name="ZipCode"><br>	
	Email Address <input  type="text" name="Email"><br>
	Password <input type="password"  name="Password"><br>
	College/University <input type="text" name="CollegeUniversity"><br>
	Education Level <input type="text" name="EducationLevel"><br>
	Degree <input type="text" name="Degree" ><br>
	Major <input type="text" name="Major"><br>
	LinkedIn Url <input type="text" name="LinkedInUrl"><br>
	Portfolio Link <input type="text" name="PortfolioLink"><br>
	<input type="submit" value="Sign Up">
  </pre>
  </form>
_END;

$query = "SELECT * FROM signup";
$result = $connection->query($query);
if (!$result) die($connection->error);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows; ++$j)
{
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_NUM);

	echo <<<_END
<pre>
First $row[0]
Last  $row[1]
Number $row[11]
Country $row[2]
City $row[3]
State $row[4]
Zip  $row[5]
Email  $row[6]
Password $row[14]
College $row[7]
Education  $row[8]
Degree $row[9]
Major $row[10]
LinkedIn $row[12]
Portfolio $row[13]
	</pre>
	<form action="databaseselect.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="hidden" name="FirstName" value="$row[0]">
	<input type="submit" value="Delete Record"></form>
_END;
}
$result->close();
$connection->close();
function get_post($connection, $var){
return $connection->real_escape_string($_POST[$var]);
}
?>



