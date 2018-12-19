<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}

// data update code starts here.
if(isset($_POST['submit']))
{
	$id = $_POST['id'];
	$class = $_POST['classid'];
	$section = $_POST['sid'];
	
	$sql="update student SET register_date=now(), class_id='$class', section_name='$section' WHERE student_id='$id' ";
	$res = mysqli_query($con,$sql);
	
	//$sql2 = "insert into marksheet_student(student_id,subject_id,class_id,section_id) values('$id','$subject','$class','$section')";
	//$res2 = mysqli_query($con,$sql);
	
	
	if($res)
	{
		$sql1="update section SET available=available-1 WHERE section_name='$section'";
		$res1 = mysqli_query($con,$sql1);
		if($res1)
		{
			
			$sql2="SELECT subject_id,name,teacher_id from subject WHERE class_id='$class'";
			$res2 = mysqli_query($con,$sql2);
			{
				while($assoc = mysqli_fetch_assoc($res2))
				{
					$sub_id=$assoc['subject_id'];
					$sub_name=$assoc['name'];
					$t_id=$assoc['teacher_id'];
					$sql3="INSERT into marksheet_student(student_id,subject_id,subject_name,class_id,section_name,teacher_id) VALUES('$id','$sub_id','$sub_name','$class','$section','$t_id')";
					$res3 = mysqli_query($con,$sql3);
				}
				
				if($res3)
				{	
					?>
					<script>
					alert('Successfully Registered');
					window.location='adminMain.php'
					</script>
					<?php
				}
				}
			}
			
		
		else
		{	?>
			<script>
			alert('Error in section registration');
			window.location='set_student.php'
			</script>
			<?php
		}
	}
	else
	{
		?>
		<script>
		alert('error in updating record...');
		window.location='update_class.php'
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
						<li><a href="adminMain.php">Back to Admin Office</a></li>
						<li class="active"><a href="set_student.php">Class & Section Registration For Student</a></li>
					</ul>

				</div>

			</nav>
			<?php

    
    include("Connection.php");
		
				
                $select = mysqli_query($con, "SELECT * FROM section");
			
 
	if( mysqli_num_rows($select) > 0) 
		{
			?>

			
			<table class="table table-striped">
          <tr>
              
              <th>Section ID</th>
              <th>Section name</th>
			  
              
			  <th>Class id</th>
			  <th>Teacher id</th>
			  
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
              <td><?php echo $userrow['section_id']; ?></td>
              <td><?php echo $userrow['section_name']; ?></td>
             
			  <td><?php echo $userrow['class_id']; ?></td>
              <td><?php echo $userrow['teacher_id']; ?></td>
              
              
			 
          </tr>
          <?php 
			}
		  } 
		?>
		</table>
			
		
			
			<div id="main1" class="container">
				<form class="form-horizontal" action='' method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Set Class & Section</legend>
					</div>
					
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Student ID</label>
					  <div class="controls">
						<input type="text" id="username" name="id" class="input-xlarge">
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Class ID</label>
					  <div class="controls">
						<input type="text" id="username" name="classid" class="input-xlarge">
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Section name</label>
					  <div class="controls">
						<input type="text" id="username" name="sid" class="input-xlarge">
						<p class="help-block">Enter Section name from the table</p><br><br>
						
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