<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}
?>

<html>
<head>
	<title>View Profile</title>
</head>


<body>

<?php
session_start();

$t_id=$_SESSION['fname'];

$getvalue = mysqli_query($con, "SELECT * FROM teacher WHERE fname='$t_id'");
			 $result=mysqli_fetch_array($getvalue);

if(isset($result['teacher_id']))
{
echo "ID: ". $result['teacher_id'];
}

echo"<br>";
if(isset($result['register_date']))
{
echo "Date of Registration: ". $result['register_date'];
}
echo"<br>";

if(isset($result['password']))
{
echo "Password: ". $result['password'];
}
echo"<br>";

if(isset($result['fname']))
{
if(isset($result['lname']))
{
echo "Name: ". $result['fname'] . " " . $result['lname']; 	
}

}
echo"<br>";
if(isset($result['date_of_birth']))
{
echo "Birth Date: ". $result['date_of_birth'];
}
echo"<br>";
if(isset($result['age']))
{
echo "Age: ". $result['age'];
}
echo"<br>";
if(isset($result['contact']))
{
echo "Contact: ". $result['contact'];
}
echo"<br>";
if(isset($result['email']))
{
echo "Email: ". $result['email'];
}
?>
<br>
<br>
<button type="button" onclick="window.location='teacherMain.php';">Back</button>
</body>
</html>