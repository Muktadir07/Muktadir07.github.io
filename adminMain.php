<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Office</title>
	
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
				height: 250px;
				padding: 5px;
			}
			#part2{
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
						<li><a href="index.php">Back to Home</a></li>
						<li class="active"><a href="#main">Admin Office</a></li>
					</ul>

				</div>

			</nav>

			<!-- End of Main Nav -->
			<center>

					<div id="main">
						<div id="part1" class="container">

							<h1>Teacher Arangment</h1>
							<button type="button" onclick="window.location='approve_application.php';" class="btn btn-primary btn-lg btn-block active">Check Teacher Applications</button>

						</div>
						
						<div id="part2" class="container">

							<h1>Student Arangment</h1>
							<button type="button" onclick="window.location='approve_application_student.php';" class="btn btn-primary btn-lg btn-block active">Check student Applications</button>
							<button type="button" onclick="window.location='set_student.php';" class="btn btn-default btn-lg btn-block active">Set Student in Section of Class</button>

						</div>
					</div>
					
					<div id="main">
						<div id="part1" class="container">

							<h1>Class</h1>
							<button type="button" onclick="window.location='new_class.php';" class="btn btn-primary btn-lg btn-block active">New Class</button>
							<button type="button" onclick="window.location='update_class.php';" class="btn btn-default btn-lg btn-block active">Update Existing Class Info</button>

						</div>
						
						<div id="part2" class="container">

							<h1>Section</h1>
							<button type="button" onclick="window.location='new_section.php';" class="btn btn-primary btn-lg btn-block active">New Section</button>
							<button type="button" onclick="window.location='update_section.php';" class="btn btn-default btn-lg btn-block active">Update Existing Section Info</button>
						</div>
					</div>
					
				
					<div id="part1" class="container">

						<h1>Subject</h1>
						<button type="button" onclick="window.location='new_subject.php';" class="btn btn-primary btn-lg btn-block active">New Subject</button>
						<button type="button" onclick="window.location='update_subject.php';" class="btn btn-default btn-lg btn-block active">Update Existing Subject Info</button>

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