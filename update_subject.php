<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}

// data update code starts here.
if(isset($_POST['submit']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mark = $_POST['totalmark'];
	$class = $_POST['classid'];
	$teacher = $_POST['teacherid'];
	
	
	$sql="update subject SET name='$name',total_mark='$mark', class_id='$class', teacher_id='$teacher' WHERE subject_id='$id' ";
	$res = mysqli_query($con,$sql);
	if($res)
	{
		
		?>
		<script>
		alert('Section info is Updated');
		window.location='adminMain.php'
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error in updating record...');
		window.location='update_subject.php'
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
	<title>Update Section Info</title>
	
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
			#main2 {
			  height: 550px;
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
						<li><a href="new_subject.php">New Subject Addition</a></li>
						<li class="active"><a href="update_subject.php">Update Subject Info</a></li>
					</ul>

				</div>

			</nav>
				
				<?php

    
    include("Connection.php");
		
				
                $select = mysqli_query($con, "SELECT * FROM subject");
			
 
	if( mysqli_num_rows($select) > 0) 
		{
			?>

			
			<table class="table table-striped">
          <tr>
              
              <th>Subject ID</th>
              <th>Subject name</th>
			  <th>Total mark</th>
              <th>Class id</th>
			  <th>Teacher id</th>
			  
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
              <td><?php echo $userrow['subject_id']; ?></td>
              <td><?php echo $userrow['name']; ?></td>
              <td><?php echo $userrow['total_mark']; ?></td>
			  <td><?php echo $userrow['class_id']; ?></td>
              <td><?php echo $userrow['teacher_id']; ?></td>
              
              
			 
          </tr>
          <?php 
			}
		  } 
		?>
		</table>
				
				
				
			<div id="main" class="container">
		
			<form class="horizontal" method= "get">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Subject ID</label>
					<div class="col-sm-10">
					  <input type = "text" name ="subject_id" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default" name="go" value="go">Search</button>
					</div>
				</div>
			</form><br>
			
		</div>
		
		<?php
			if(isset($_GET['go']))
			{
				
		
			$t_id = mysqli_real_escape_string($con,$_GET['subject_id']);
			 $getvalue = mysqli_query($con, "SELECT * FROM subject WHERE  subject_id='$t_id'");
			 $result=mysqli_fetch_array($getvalue);
				if($result)
				{
					
				}
				else 
				{
					echo '<script language="javascript">';
					echo 'alert("no matched result")';
					echo '</script>';
				}
				
			 }
			 
			
		?>
			
			<div id="main2" class="container">
				<form class="form-horizontal" action='' method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Update Subject Info</legend>
					</div>
					
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Subject ID</label>
					  <div class="controls">
						<input type="text" id="username" name="id" placeholder="" value = "<?php if(isset($result['subject_id']))echo $result['subject_id'];?>" class="input-xlarge">
						<p class="help-block"style="color:red;">*You can not change this section</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- Username -->
					  <label class="control-label"  for="username">Updated Subject Name</label>
					  <div class="controls">
						<input type="text" id="username" name="name" placeholder=""  value = "<?php if(isset($result['name']))echo $result['name'];?>" class="input-xlarge">
						<p class="help-block">Updated subject name can contain any letters or numbers, without spaces</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- gpa -->
					  <label class="control-label"  for="grade">Total Mark</label>
					  <div class="controls">
						<input type="number" id="gpa" name="totalmark" placeholder=""  value = "<?php if(isset($result['total_mark']))echo $result['total_mark'];?>" class="input-xlarge">
						<p class="help-block">Enter the updated total mark</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- year -->
					  <label class="control-label"  for="grade">Class Id</label>
					  <div class="controls">
						<input type="number" id="gpa" name="classid" placeholder="" value = "<?php if(isset($result['class_id']))echo $result['class_id'];?>" class="input-xlarge">
						<p class="help-block">Enter Updated class id Value.</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- year -->
					  <label class="control-label"  for="grade">Teacher Id</label>
					  <div class="controls">
						<input type="number" id="gpa" name="teacherid" placeholder=""  value = "<?php if(isset($result['teacher_id']))echo $result['teacher_id'];?>" class="input-xlarge">
						<p class="help-block">Enter Updated teacher id Value.</p>
					  </div>
					</div>

					<div class="control-group">
					  <!-- Button -->
					  <div class="controls">
						<button type="submit" class="btn btn-success" name="submit">Update</button>
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