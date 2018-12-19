<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	
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
			
			if ($_SERVER["REQUEST_METHOD"] == "POST"){
					include('connection.php');
					$username = 'admin';
						$password = $_POST['pass'];
						$sql = "select * from users where username ='$username' and password='$password'";
						$result = mysqli_query($con,$sql);
					
						if(mysqli_num_rows($result)>0)				
						{
							header("Location:adminMain.php");
						}
						else
						{
							echo "<script>window.alert('wrong username and password')</script>";
									
							
						}
			}

			?>

		<nav class="navbar navbar-default" role="navigation">

			<div class="container">

				<ul class="nav navbar-nav">
					<li><a href="index.php">Back to Home</a></li>
					<li class="active"><a href="admin.php">Admin Login</a></li>
				</ul>

			</div>

		</nav>

		<!-- End of Main Nav -->
		<div id="main">
			<div style="padding:100px" class="container">
			
				<form class="form-horizontal" method="post">
				  <div class="form-group">
					<label class="sr-only"></label>
					<h1 class="form-control-static"><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>
</h1>
				  </div>
				  <div class="form-group">
					<label for="inputPassword2" class="sr-only">Password</label>
					<input type="password" class="form-control" id="inputPassword2" name="pass" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-default" name="submit"><i class="fa fa-sign-in fa-3x" aria-hidden="true"></i></button>
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