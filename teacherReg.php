<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	
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
		
		<script>
			function ValidateRegistrationForm()
			{
				var name     =ApplyForm.tname;
				var email    =ApplyForm.email;
				var pass    =ApplyForm.password;
				var cpass    =ApplyForm.cpassword;
				var dept     =ApplyForm.department;
				if (name.value == "")
				{
					window.alert("Please Enter Your Full Name.");
					name.focus();
					return false;
				}
				
			   if (!/^[a-zA-Z]*$/g.test(name.value)) {
					alert("Invalid characters");
					name.focus();
					return false;
				}


			  if (pass.value == "")
				{
					window.alert("Please enter your Password.");
					pass.focus();
					return false;
				}
			   if (pass.value.length <6)
				{
					window.alert("Password Atleast 6 Character Long.");
					pass.focus();
					return false;
				}
				 if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(pass.value)) {
					alert("Invalid password there must be atleast 1 upper case or 1 lower case letter and A digit");
					pass.focus();
					return false;
				}
				if (cpass.value == "")
				{
					window.alert("Please confirm your Password.");
					cpass.focus();
					return false;
				}
			 if (cpass.value!= pass.value) {
					alert("Password does not match");
					cpass.focus();
					return false;
				}
				if (!validateCaseSensitiveEmail(email.value))
				{
					window.alert("Please enter a valid e-mail address.");
					email.focus();
					return false;
				}

			   if (dept.value == "")
				{
					window.alert("Please enter your Department.");
					dept.focus();
					return false;
				}

			 
				return true;
			}

			function validateCaseSensitiveEmail(email) 
			{ 
			 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
			 if (reg.test(email)){
			 return true; 
			}
			 else{
			 return false;
			 } 
			} 

			</script>
		
		<style>
			#main {
			  height: 575px;
			  padding: 10px
			  
			}
		
		</style>
	
	</head>

	<body>
		<?php 

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			include "Connection.php";
					 $tname     =$_POST['tname'];
						
					  $pass    =$_POST['password']; 
					 $email    =$_POST['email'];
					
					 $dept    =$_POST['department'];



			 $query="select * from teacher_application where t_name='$tname'";
			 $Result=mysqli_query($con,$query);
			 $exist=mysqli_num_rows($Result);


			if(!$exist){

				   
					 $appl_stat=0;

					 $query="insert into teacher_application(t_name,t_password,t_email,t_department,apply_status) values('$tname','$pass','$email','$dept','$appl_stat')";
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


		?>
	
		<div class="container">

			<nav class="navbar navbar-default" role="navigation">

				<div class="container">

					<ul class="nav navbar-nav">
						<li><a href="index.php">Back to Home</a></li>
						<li><a href="admission.php">Admission Registration</a></li>
						<li class="active"><a href="teacherReg.php">Teacher Registration</a></li>
					</ul>

				</div>

			</nav>
			
			<div id="main" class="container">
				<form class="form-horizontal" method="POST"  action="#" role="form" enctype="multipart/form-data" name="ApplyForm" onsubmit="return ValidateRegistrationForm();">
				  <fieldset>
					<div id="legend">
					  <legend class="">Teacher Register</legend>
					</div>
					<div class="control-group">
					  <!-- Username -->
					  <label class="control-label"  for="username">Teacher Name</label>
					  <div class="controls">
						<input type="text" id="username" name="tname" placeholder="" class="input-xlarge">
						<p class="help-block">Name can contain any letters or numbers, without spaces</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">Password</label>
					  <div class="controls">
						<input type="Password" id="pass" name="password" placeholder="password" class="input-xlarge">
						<p class="help-block">Enter Password</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">Confirm Password</label>
					  <div class="controls">
						<input type="Password" id="cpass" name="cpassword" placeholder="password" class="input-xlarge">
						<p class="help-block">Enter Password Again</p>
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
					  <!-- dpt -->
					  <label class="control-label" for="dpt">Department</label>
					  <div class="controls">
						<input type="text" id="dpt" name="department" placeholder="" class="input-xlarge">
						<p class="help-block">Please provide the name of department.</p>
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- Button -->
					  <div class="controls">
						<button type="submit" class="btn btn-success" name="submit" value="Apply">Register</button>
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