<?php 

?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	
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

		<nav class="navbar navbar-default" role="navigation">

			<div class="container">

				<ul class="nav navbar-nav">
					<li class="active"><a href="login.php">Login</a></li>
					<li><a href="index.php">Back to Home</a></li>
				</ul>

			</div>

		</nav>

		<!-- End of login Nav -->

		<div id="teacher" class="container">
		
			<h1><a href="tlog.php"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true">Teacher</i></a></h1>	
		
		</div>
		<hr>
		<div id="student" class="container">
		
			<h1><a href="slog.php"><i class="fa fa-user-o fa-2x" aria-hidden="true">Student</i></a></h1>
			
		</div>


		<footer class="panel-footer">
		  <div class="container">
			<p class="text-muted">@cms</p>
		  </div>
		</footer>

	</body>
	

</html>