<?php


include("Connection.php");

session_start();

$id=$_SESSION['fname'];

if(isset($_POST['submit']))
{
	$pass = $_POST['password'];
	$email = $_POST['email'];
	
	
	$sql="update teacher SET password='$pass', email='$email' WHERE fname='$id' ";
	$res = mysqli_query($con,$sql);
	if($res)
	{
		
		?>
		<script>
		alert('Profile is Updated');
		window.location='teacherMain.php'
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error in updating record...');
		window.location='teacherUpdate.php'
		</script>
		<?php
	}

	
	
}



?>


	
	








<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		
		<style>
			#main {
			  height: 100px;
			  padding: 10px
			  
			}
			#main1 {
			  height: 525px;
			  padding: 10px
			  
			}
		
		</style>
	
	</head>

	<body>
	
		<div class="container">

			<nav class="navbar navbar-default" role="navigation">

				<div class="container">

					<ul class="nav navbar-nav">
						<li><a href="teacherMain.php">Back to home</a></li>
						<li class="active"><a href="teacherUpdate.php">Teacher Update</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>

				</div>

			</nav>
		
			
		
		
			 
			
			
			
			
		</div>
		
			
			<div id="main1" class="container">
				<form class="form-horizontal"  method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Update value</legend>
					</div>
					<div class="control-group">
						  <!-- Password -->
						  <label class="control-label"  for="username">Password</label>
						  <div class="controls">
							<input type="text" id="username" name="password" placeholder="" class="input-xlarge">
							<p class="help-block">Enter the Updated Password</p>
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
						<button type="submit" class="btn btn-success" name="submit">Set</button>
						
					  </div>
					</div>
				  </fieldset>
				</form>
				
			</div>
			
			<footer class="panel-footer">
			  <div class="container">
				<p class="text-muted">@cms</p>
			  </div>
			</footer>
			
		</div>
	</body>
	</html>













































