<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}

// data insert code starts here.
if(isset($_POST['submit']))
{
	$name = $_POST['username'];
	$gpa = $_POST['gpa'];
	$email = $_POST['email'];
	
	if($gpa>5)
	{
		?>
			<script>
			alert('Sorry! Your enterd GPA is not valid.');
			window.location='index.php'
			</script>
		<?php
	}
	
	if($gpa<2)
	{
		?>
			<script>
			alert('Sorry! You have not enough GPA point to register here.');
			window.location='admission.php'
			</script>
		<?php
	}
	else
	{
		$sql="INSERT into admission(username,gpa,email) VALUES('$name','$gpa','$email')";
		$res = mysqli_query($con,$sql);
		if($res)
		{
			
			?>
			<script>
			alert('Application is Submitted');
			window.location='index.php'
			</script>
			<?php
			/*$sql1="SELECT * FROM admission ORDER BY admission_id DESC LIMIT 1";
			$rslt=mysqli_query($con,$sql1);
			while($row=mysqli_fetch_row($rslt))
			{
				echo "Your Application Is Submitted.";
				echo $row[admission_id];
				echo $row[username];
				echo $row[gpa];
				echo $row[email];
			}*/
		}
		else
		{
			?>
			<script>
			alert('error inserting record...');
			window.location='admission.php'
			</script>
			<?php
		}
	}
	
	
}
// data insert code ends here.

?>




<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admission Registration</title>
	
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
			  height: 525px;
			  padding: 10px
			  
			}
		
		</style>
	
	</head>

	<body>
	
	<?php 
/*
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			include "Connection.php";
					 $name     =$_POST['username'];
					 $gpa    =$_POST['gpa']; 
					 $email    =$_POST['email'];
					



			 $query="select * from admission where username='$name'";
			 $Result=mysqli_query($con,$query);
			 $exist=mysqli_num_rows($Result);


			if(!$exist){

				   
					 $appl_stat=0;

					 $query="insert into admission(username,gpa,email,apply_status) values('$name','$gpa','$email','$appl_stat')";
					 if (mysqli_query($con, $query))
					  {
						echo '<script language="javascript">';
						echo 'alert("Registration successfully")';
						echo '</script>';
						

						}

				    else {
					echo "Error: " . $query . "<br>" . mysqli_error($con);
					  }

				 
				  }
				  else
				  {
						echo '<script language="javascript">';
						echo 'alert("Already an application sent")';
						echo '</script>';
				  }
				}


		*/?>
	
		<div class="container">

			<nav class="navbar navbar-default" role="navigation">

				<div class="container">

					<ul class="nav navbar-nav">
						<li><a href="index.php">Back to Home</a></li>
						<li class="active"><a href="admission.php">Admission Registration</a></li>
						<li><a href="teacherReg.php">Teacher Registration</a></li>
					</ul>

				</div>

			</nav>
			
			<div id="main" class="container">
				<form class="form-horizontal" action='' method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Admission Register</legend>
					</div>
					<div class="control-group">
					  <!-- Username -->
					  <label class="control-label"  for="username">Username</label>
					  <div class="controls">
						<input type="text" id="username" name="username" placeholder="" class="input-xlarge">
						<p class="help-block">Username can contain any letters or numbers, without spaces</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">GPA</label>
					  <div class="controls">
						<input type="number" id="gpa" name="gpa" placeholder="" class="input-xlarge">
						<p class="help-block">Enter Your SSC GPA floor point out of 5, such 3 or 4 or 5. Not 3.5 or 4.5</p>
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- E-mail -->
					  <label class="control-label" for="email">E-mail</label>
					  <div class="controls">
						<input type="text" id="email" name="email" placeholder="" class="input-xlarge">
						<p class="help-block">Please provide your E-mail</p>
					  </div>
					</div>
				 
					
				 
					<div class="control-group">
					  <!-- Button -->
					  <div class="controls">
						<button type="submit" class="btn btn-success" name="submit">Register</button>
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