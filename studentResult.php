<?php


include("Connection.php");
	if(isset($_POST['submit']))
	{	
		
						$stdid=$_POST['std_id'];
				
						$sum =  "SELECT SUM(obtain_mark) FROM marksheet_student WHERE student_id='$stdid' ";
						$res3 = mysqli_query($con,$sum);
	
	
	if($res3)
	{
			
				$sum2 =  "INSERT into student_result(student_id,result) VALUES('$stdid','$res3')";
					$res4 = mysqli_query($con,$sum2);
				
				if($res4)
				{
					?>
			<script>
			alert('Successfull');
			window.location='studentResult.php'
			</script>
				<?php
				}
				
				
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
						<li><a href="studentMain.php">Back to home</a></li>
						<li class="active"><a href="studentResult.php">View Result</a></li>
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
				header("Location : slog.php");
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
				$sql2="SELECT student_id from student WHERE fname='$userId'";
				$res2 = mysqli_query($con,$sql2);
					
					while($assoc = mysqli_fetch_assoc($res2))
					{
						$sid=$assoc['student_id'];
				
						$tid=$_GET['st_id'];
		
						if($tid==$sid)
						{
						
						$select = mysqli_query($con, "SELECT * FROM marksheet_student WHERE student_id='$tid' ");
						
						if( mysqli_num_rows($select) > 0) 
				{
			?>

			
			<table class="table table-striped">
          <tr>
              
              
              <th>Section name</th>
			  <th>subject name</th>
              <th>Student id</th>
			  <th>Class id</th>
			  <th>Obtained mark</th>
			  
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
             
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
			}
		?>
		</table>
		
		
			 
			
			
			<div id="main" class="container">
		
			<form class="horizontal" method= "get">
				<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Student id</label>
					  <div class="controls">
						<input type="text" id="username" name="st_id" class="input-xlarge">
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
					  <label class="control-label"  for="username">Student id</label>
					  <div class="controls">
						<input type="text" id="username" name="std_id" class="input-xlarge">
					  </div>
					</div>
					
					
					

					<div class="control-group">
					  <!-- Button -->
					  <div class="controls">
						<button type="submit" class="btn btn-success" name="submit">Total mark</button>
						
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