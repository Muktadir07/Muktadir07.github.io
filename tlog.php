<?php 

?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher Login</title>
	
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
						header("Location:teacherMain.php");
						}
					if ($_SERVER["REQUEST_METHOD"] == "POST"){
						$username = $_POST['id'];
						$password = $_POST['pass'];
						
						$sql = "select * from teacher where fname ='$username' and password='$password'";
						$result = mysqli_query($con,$sql);
						$numrow = mysqli_num_rows($result);
						if( $numrow >0){
						if(isset($_POST['remember_me'])){
								setcookie("fname",$_POST['fname'],time()+86400);
							}
							$_SESSION['fname']=$username;
							header("Location: teacherMain.php");
						} else {
							?>
								<script>
								alert('error in updating record...');
								window.location='tlog.php'
								</script>
								<?php
						}
			}

			?>

		<nav class="navbar navbar-default" role="navigation">

			<div class="container">

				<ul class="nav navbar-nav">
					<li><a href="login.php">Back to Login</a></li>
					<li><a class="active" href="tlog.php">Teacher</a></li> 
					<li><a href="index.php">Back to Home</a></li>
				</ul>

			</div>

		</nav>

		<!-- End of login Nav -->

		<div id="main" class="container">
			<form method="POST" action="#" class="form-horizontal">
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label"><i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="id" placeholder="User Name">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputPassword3" name="pass" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
					  <input type="checkbox" name="remember_me"> Remember me
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
		
		</div>


		<footer class="panel-footer">
		  <div class="container">
			<p class="text-muted">@cms</p>
		  </div>
		</footer>

	</body>
	

</html>