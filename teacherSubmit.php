<?php


include("Connection.php");
	if(isset($_POST['submit']))
	{	$marks = $_POST['mark'];
		if($marks>100)
		{
		?>
			<script>
			alert('Can not enter values over total mark');
			window.location='teacherSubmit.php'
			</script>
				<?php
	}
		
	else{
		
	


	
	
	$std_id = $_POST['st_id'];
	
	
	$sql="UPDATE marksheet_student SET obtain_mark='$marks' WHERE marksheet_student_id='$std_id' ";
	$res = mysqli_query($con,$sql);
	
	
	if($res)
	{
			
				
			?>
			<script>
			alert('Successfull');
			window.location='teacherSubmit.php'
			</script>
				<?php
				
				
			}
			
		
		

	else
	{
		?>
		<script>
		alert('error in updating record...');
		window.location='teacherSubmit.php'
		</script>
		<?php
		}
	}
	}


	
	

// data update code ends here.

?>




<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student' class & section registration</title>
	
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
			  height: 100px;
			  padding: 10px
			  
			}
			#main1 {
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
						<li><a href="teacherMain.php">Back to home</a></li>
						<li class="active"><a href="teacherSubmit.php">Teacher Submit</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>

				</div>

			</nav>
		
			<?php

    
    include("Connection.php");
	session_start();
		if (!$con) {
		  die('Can not connect with the database : ' . mysqli_error());
		}

			$userId="";
			if(!isset($_COOKIE['fname']) && !isset($_SESSION['fname'])){
				header("Location : tlog.php");
			} else {
				if(isset($_SESSION['fname'])){
					$userId =$_SESSION['fname'];
				}
				if(isset($_COOKIE['fname'])){
					$userId =$_COOKIE['fname'];
				}
			}
	
	if(isset($_GET['go']))
		
			{
				
				$sql2="SELECT teacher_id from teacher WHERE fname='$userId'";
				$res2 = mysqli_query($con,$sql2);
					
					while($assoc = mysqli_fetch_assoc($res2))
					{
						$tid=$assoc['teacher_id'];
		
						$t_id = $_GET['section_name'];
						
						$select = mysqli_query($con, "SELECT * FROM marksheet_student WHERE teacher_id='$tid' and section_name='$t_id'");
						
						if( mysqli_num_rows($select) > 0) 
				{
			?>

			
			<table class="table table-striped">
          <tr>
              
              <th>Marksheet id</th>
              <th>Section name</th>
			  <th>subject name</th>
              <th>Student id</th>
			  <th>Class id</th>
			  <th>Obtained mark</th>
			  
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
              <td><?php echo $userrow['marksheet_student_id']; ?></td>
              <td><?php echo $userrow['section_name']; ?></td>
             <td><?php echo $userrow['subject_name']; ?></td>
			 <td><?php echo $userrow['student_id']; ?></td>
			  <td><?php echo $userrow['class_id']; ?></td>
              <td><?php echo $userrow['obtain_mark']; ?></td>
              
              
			 
          </tr>
          <?php 
					}
				} 
			}
			}
		?>
		</table>
		
		
			 
			
			
			<div id="main" class="container">
		
			<form class="horizontal" method= "get">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Section name</label>
					<div class="col-sm-10">
					  <input type = "text" name ="section_name" required>
					  
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default" name="go" value="go">Check</button>
					</div>
				</div>
			</form><br>
			
		</div>
		
			
			<div id="main1" class="container">
				<form class="form-horizontal"  method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Set Class & Section</legend>
					</div>
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Marksheet id</label>
					  <div class="controls">
						<input type="text" id="username" name="st_id" class="input-xlarge">
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">INSERT MARK</label>
					  <div class="controls">
						<input type="number" id="username" name="mark" class="input-xlarge">
						
					  </div>
					</div>
					

					<div class="control-group">
					  <!-- Button -->
					  <div class="controls">
						<button type="submit" class="btn btn-success" name="submit">Set</button>
						
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