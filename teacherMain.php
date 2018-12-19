<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher</title>
	
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
			#part1{
				height: 175px;
				padding: 5px;
			}
			#part2{
				height: 175px;
				padding: 5px;
			}
			#part3{
				height: 175px;
				padding: 5px;
			}
		
		</style>
	
	</head>

	<body>
		
		<div class="container">

			<nav class="navbar navbar-default" role="navigation">

				<div class="container">

					<ul class="nav navbar-nav">
						<li class="active"><a href="teacherMain.php">Teacher</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>

				</div>

			</nav>

			<!-- End of Main Nav -->
			<center>

					<div id="main">
						<div id="part1" class="container">

							<h1>Teacher Profile View</h1>
							<button type="button" onclick="window.location='teacherView.php';" class="btn btn-primary btn-lg btn-block active">Click to View</button>

						</div>
						
						<div id="part2" class="container">

							<h1>Teacher Profile Update</h1>
							<button type="button" onclick="window.location='teacherUpdate.php';" class="btn btn-primary btn-lg btn-block active">Click to Update</button>

						</div>
						
						<div id="part3" class="container">

							<h1>Result Submittion</h1>
							<button type="button" onclick="window.location='teacherSubmit.php';" class="btn btn-primary btn-lg btn-block active">Click to Submit Result</button>

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