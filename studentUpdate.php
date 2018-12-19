<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}
?>

<html>
<head>
	<title>Update Profile</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap-theme.min.css">
		
		<!-- FontAwesome -->
		<link href="font-awesome.min.css" rel="stylesheet">
		
		<!-- jQuery CSS -->
		<link href="jquery-ui.css" rel="stylesheet">
		
		<!-- jQuery -->
		<script src="jquery-3.2.1.min.js"></script>
		
		<!-- jQuery UI -->
		<script src="jquery-ui.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();

$id=$_SESSION['fname'];

if(isset($_POST['submit']))
{
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	
	
	$sql="update student SET lname='$lname', email='$email' WHERE fname='$id' ";
	$res = mysqli_query($con,$sql);
	if($res)
	{
		
		?>
		<script>
		alert('Profile is Updated');
		window.location='studentView.php'
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error in updating record...');
		window.location='studentUpdate.php'
		</script>
		<?php
	}

	
	
}



?>
<form class="form-horizontal" action='' method="POST">
	<div class="control-group">
	  <!-- Password -->
	  <label class="control-label"  for="username">Last Name</label>
	  <div class="controls">
		<input type="text" id="username" name="lname" placeholder="" class="input-xlarge">
		<p class="help-block">Enter the Updated username</p>
	  </div>
	</div>
	<div class="control-group">
	  <!-- email -->
	  <label class="control-label"  for="username">Email</label>
	  <div class="controls">
		<input type="text" id="username" name="email" placeholder="" class="input-xlarge">
		<p class="help-block">Enter the Updated email</p>
	  </div>
	</div>

	<div class="control-group">
	  <!-- Button -->
	  <div class="controls">
		<button type="submit" class="btn btn-success" name="submit">Update</button>
	  </div>
	</div>
</form>
<br>
<br>
<button type="button" onclick="window.location='studentMain.php';">Back</button>
</body>
</html>