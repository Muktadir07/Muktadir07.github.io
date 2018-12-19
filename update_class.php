<?php
$con = mysqli_connect('localhost', 'root',"", 'sms411');
if (!$con) {
  die('Can not connect with the database : ' . mysqli_error());
}

// data update code starts here.
if(isset($_POST['submit']))
{
	$id = $_POST['id'];
	$name = $_POST['classname'];
	$year = $_POST['year'];
	
	
	$sql="update class SET class_name='$name', year='$year' WHERE class_id='$id' ";
	$res = mysqli_query($con,$sql);
	if($res)
	{
		
		?>
		<script>
		alert('Class info is Updated');
		window.location='adminMain.php'
		</script>
		<?php
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
	<title>Update Class Info</title>
	
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
			  height: 500px;
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
						<li><a href="new_class.php">New Class Addition</a></li>
						<li class="active"><a href="upadte_class.php">Update Class Info</a></li>
					</ul>

				</div>

			</nav>
	<?php

    
		include("Connection.php");
		
				
                $select = mysqli_query($con, "SELECT * FROM class");
			
 
		if( mysqli_num_rows($select) > 0) 
		{
			?>

			
			<table class="table table-striped">
          <tr>
              
              <th>Class ID</th>
              <th>Class name</th>
              <th>year</th>
			  
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
              <td><?php echo $userrow['class_id']; ?></td>
              <td><?php echo $userrow['class_name']; ?></td>
              <td><?php echo $userrow['Year']; ?></td>
              
              
              
			 
          </tr>
          <?php 
			}
		  } 
		?>
		</table>
			
		<div id="main" class="container">
		
			<form class="horizontal" method= "get">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Class ID</label>
					<div class="col-sm-10">
					  <input type = "text" name ="class_id" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default" name="go" value="go">Go</button>
					</div>
				</div>
			</form><br>
			
		</div>
		
		<?php
			if(isset($_GET['go']))
			{
				
		
			$t_id = mysqli_real_escape_string($con,$_GET['class_id']);
			 $getvalue = mysqli_query($con, "SELECT * FROM class WHERE  class_id='$t_id'");
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
			
			<div id="main1" class="container">
				<form class="form-horizontal" action='' method="POST">
				  <fieldset>
					<div id="legend">
					  <legend class="">Update Class Info</legend>
					</div>
					
					<div class="control-group">
					  <!-- id -->
					  <label class="control-label"  for="username">Class ID</label>
					  <div class="controls">
						<input type="text" id="username" name="id" value = "<?php if(isset($result['class_id']))echo $result['class_id'];?>" class="input-xlarge">
						<p class="help-block"style="color:red;">*You can not change this section</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- Username -->
					  <label class="control-label"  for="username">Class Name</label>
					  <div class="controls">
						<input type="text" id="username" name="classname" value = "<?php if(isset($result['class_name']))echo $result['class_name'];?>" placeholder="" class="input-xlarge">
						<p class="help-block">Updated Class name can contain any letters or numbers, without spaces</p>
					  </div>
					</div>
					
					<div class="control-group">
					  <!-- year -->
					  <label class="control-label"  for="grade">Year</label>
					  <div class="controls">
						<input type="number" id="gpa" name="year" placeholder="" value = "<?php if(isset($result['Year']))echo $result['Year'];?>" class="input-xlarge">
						<p class="help-block">Enter the updated year. Such 2009 or 2010.</p>
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