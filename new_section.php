<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}

// data insert code starts here.
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$seat = $_POST['seat'];
	$class = $_POST['classid'];
	$teacher = $_POST['teacherid'];
	
	
	$sql="INSERT into section(section_name,available,seat,class_id,teacher_id) VALUES('$name','$seat','$seat','$class','$teacher')";
	$res = mysqli_query($con,$sql);
	if($res)
	{
		
		?>
		<script>
		alert('Section info is added');
		window.location='adminMain.php'
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error inserting record...');
		window.location='new_section.php'
		</script>
		<?php
	}

	
	
}
// data insert code ends here.

?>




<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New Section</title>
	
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
	
		<div class="container">

			<nav class="navbar navbar-default" role="navigation">

				<div class="container">

					<ul class="nav navbar-nav">
						<li><a href="adminMain.php">Back to Admin Office</a></li>
						<li class="active"><a href="new_section.php">New Section Addition</a></li>
						<li><a href="update_section.php">Update Section Info</a></li>
					</ul>

				</div>

			</nav>
			
			<div id="main" class="container">
				<form class="form-horizontal" action='' method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Section Registration</legend>
					</div>
					<div class="control-group">
					  <!-- Username -->
					  <label class="control-label"  for="username">Section Name</label>
					  <div class="controls">
						<input type="text" id="username" name="name" placeholder="" class="input-xlarge">
						<p class="help-block">Class name can contain any letters or numbers, without spaces</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">Seat Size</label>
					  <div class="controls">
						<input type="number" id="gpa" name="seat" placeholder="" class="input-xlarge">
						<p class="help-block">Enter the seat size of the section</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">Class ID</label>
					  <div class="controls">
						<input type="number" id="gpa" name="classid" placeholder="" class="input-xlarge">
						<p class="help-block">Enter the class Id</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">Teacher ID</label>
					  <div class="controls">
						<input type="number" id="gpa" name="teacherid" placeholder="" class="input-xlarge">
						<p class="help-block">Enter the teacher Id</p>
					  </div>
					</div>

					<div class="control-group">
					  <!-- Button -->
					  <div class="controls">
						<button type="submit" class="btn btn-success" name="submit">ADD</button>
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