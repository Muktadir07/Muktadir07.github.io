<?php 

?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Login</title>
	
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
			#teacher{
				height: 250px;
				padding: 5px;
			}
			#student{
				height: 250px;
				padding: 5px;
			}
		
		</style>
	
	</head>
	
	<body>
	
		<?php 
			
			
					include('Connection.php');
					session_start();
					
					if(isset($_SESSION['fname']))
						{
						header("Location:studentMain.php");
						}
					if ($_SERVER["REQUEST_METHOD"] == "POST"){
						$username = $_POST['id'];
					
						$email = $_POST['email'];
						$sql = "select * from student where fname ='$username' and email='$email'";
						$result = mysqli_query($con,$sql);
						$numrow = mysqli_num_rows($result);
						if( $numrow >0){
						if(isset($_POST['remember_me'])){
								setcookie("fname",$_POST['fname'],time()+86400);
							}
							$_SESSION['fname']=$username;
							header("Location: studentMain.php");
						} else {
							?>
								<script>
								alert('error in updating record...');
								window.location='slog.php'
								</script>
								<?php
						}
			}

			?>

		<nav class="navbar navbar-default" role="navigation">

			<div class="container">

				<ul class="nav navbar-nav">
					<li><a href="login.php">Back to Login</a></li>
					<li><a class="active" href="slog.php">Student</a></li>
					<li><a href="index.php">Back to Home</a></li>
				</ul>

			</div>

		</nav>

		<!-- End of login Nav -->

		<div id="main" class="container">
		
			<form method="post" action="#" class="form-horizontal">
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="id" placeholder="Student Name">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
				  <input type="text" name="email" class="form-control" id="inputPassword3" placeholder="Email">
				</div>
			  </div>
			  <!--
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
				</div>
			  </div>-->
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Remember me
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Login</button>
				</div>
			  </div>
			</form>
		
		</div>


		<footer class="panel-footer">
		  <div class="container">
			<p class="text-muted">@cms</p>
		  </div>
		</footer>

	</body>
	

</html>