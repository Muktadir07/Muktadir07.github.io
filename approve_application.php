<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Teacher Application</title>
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
						<li class="active"><a href="adminMain.php">Back to Admin Office</a></li>
					</ul>

				</div>

			</nav>

		
		<?php

    
    include("Connection.php");
		
				
                $select = mysqli_query($con, "SELECT * FROM teacher_application WHERE apply_status = '0'");
			
 
	if( mysqli_num_rows($select) > 0) 
		{
			?>

			
			<table class="table table-striped">
          <tr>
              
              <th>Faculty Name</th>
              <th>Email</th>
              <th>Department</th>
			  <th>Apply stasus</th>
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
              <td><?php echo $userrow['t_name']; ?></td>
              <td><?php echo $userrow['t_email']; ?></td>
              <td><?php echo $userrow['t_department']; ?></td>
              
              <td><?php 
			if($userrow['apply_status']==0)
				{
					echo("Applied");
				} else if($userrow['apply_status']==1) {
					echo("Accepted");
				}
					else{
						echo("Rejected");
					}
				}
				?></td>
              
			 
          </tr>
          <?php 
		  } 
		?>
		</table>
		
			

	<form class="horizontal" method= "get">
		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Teacher Name</label>
		<div class="col-sm-10">
		  <input type = "text" name ="fname" required>
		</div>
		</div>
		
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default" name="go" value="go">Go</button>
		  <br>
		  <br>
		</div>
		</div>
		
		</form><br>
		<?php
			if(isset($_GET['go']))
			{
				
		
			$t_id = mysqli_real_escape_string($con,$_GET['fname']);
			 $getvalue = mysqli_query($con, "SELECT * FROM teacher_application WHERE t_name ='$t_id'");
			 $result=mysqli_fetch_array($getvalue);
				if($result['apply_status']==1)
				{
					echo '<script language="javascript">';
					echo 'alert("ALready accepted")';
					echo '</script>';
				}
				else if($result['apply_status']==2)
				{
					echo '<script language="javascript">';
					echo 'alert("ALready accepted")';
					echo '</script>';
				}
				else{
			 $a = $t_id;
				}
			 }
			 
			
		?>
	
	
	<form class="horizontal" method = "post" onsubmit = " return confirm('are you sure u want to accept or reject ?')">
	
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Faculty Name</label>
					<div class="col-sm-10">
					  <input type = "text" name="t_name" value = "<?php if(isset($result['t_name'])&&($result['apply_status']==0))echo $result['t_name'];?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email </label>
					<div class="col-sm-10">
					  <input type = "text" name="t_email" value = "<?php if(isset($result['t_email'])&&($result['apply_status']==0))echo $result['t_email'];?>"  required >
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Department</label>
					<div class="col-sm-10">
					<input type = "text" name="t_department" value = "<?php if(isset($result['t_department'])&&($result['apply_status']==0))echo $result['t_department'];?>" ><br> 
					<br>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button class="btn btn-default" type = "submit" name = "accept" value= "accept">ACCEPT</button><br>
					<br>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button class="btn btn-default" type = "submit" name = "reject" value= "reject">REJECT</button>
					</div>
				</div>

	  
	<input type="hidden" name="t_password" value = "<?php if(isset($result['t_password'])&&($result['apply_status']==0))echo $result['t_password'];?>">	
	<input type="hidden" name="e_id" value="<?php if(isset($a)) echo $a ; ?>">
		
			
	</form>	
	<?php 
			
			if(isset($_POST['accept']))
			{	
				
				$applied=1;
				$te_id = $_POST['e_id'];
				$name = $_POST['t_name'];
				$email = $_POST['t_email'];
				$pass = $_POST['t_password'];
				 
				$accept=mysqli_query($con,"update teacher_application set apply_status = '$applied' WHERE t_name = '$te_id'");
				{
					echo  "<script type='text/javascript'>alert('Application accepted');
							window.location='approve_application.php';</script>";
                    if($accept)
					{
						$sql=mysqli_query($con,"INSERT into teacher(fname,email,password) VALUES('$name','$email','$pass')");
					}
				}
			}
			if(isset($_POST['reject']))
			{	
				$applied=2;
				 $te_id = $_POST['e_id'];
				 
				$reject=mysqli_query($con,"update teacher_application set apply_status = '$applied' WHERE t_name = '$te_id'");
				{
					echo  "<script type='text/javascript'>alert('Application rejected');
					window.location='approve_application.php';</script>";
					
                   if($reject)
					{
						$sql=mysqli_query($con,"DELETE from teacher_application WHERE t_name = '$te_id'");
					}
				}
			}
			?>
	</div>
	
	
	
	</div>
</div>
</body>
</html>