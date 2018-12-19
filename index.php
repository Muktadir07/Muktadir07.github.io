<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	
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
			#about{
				height: 250px;
				padding: 5px;
			}
			#contact{
				height: 250px;
				padding: 5px;
			}
		
		</style>
	
	</head>

	<body>
		
		<div class="container">

			<nav class="navbar navbar-default" role="navigation">

				<div class="container">

					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="admission.php">Registration</a></li>
						<li><a href="admin.php">Admin</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="#about">About Us</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>

				</div>

			</nav>

			<!-- End of Main Nav -->
			<center>

					<div id="main">
						<div id="about" class="container">

							<h1>About</h1>
							<hr>
							<p>This is complete management system.</p>
							<img src="..." alt="..." class="img-rounded">

						</div>
						
						<div id="contact" class="container">

							<h1>Contacts</h1>
							<hr>
							<p>Contact: @contact</p>
							<img src="..." alt="..." class="img-rounded">

						</div>
					</div>


					<footer class="panel-footer">
					  <div class="container">
						<p class="text-muted">@cms</p>
					  </div>
					</footer>
			</center>		
		</div>
	</body>
	
</html>