<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Student Application</title>
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
		
				
                $select = mysqli_query($con, "SELECT * FROM admission WHERE apply_status = '0'");
			
 
	if( mysqli_num_rows($select) > 0) 
		{
			?>

			
			<table class="table table-striped">
          <tr>
              
              <th>Username</th>
              <th>Email</th>
              <th>GPA</th>
			  <th>Apply status</th>
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) )
			{ ?>
          <tr>
              <td><?php echo $userrow['username']; ?></td>
              <td><?php echo $userrow['email']; ?></td>
              <td><?php echo $userrow['gpa']; ?></td>
              
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
		<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-10">
		  <input type = "text" name ="username" required><br><br>
		</div>
		</div>
		
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default" name="go" value="go">Search</button><br><br><hr>
		</div>
		</div>
		
		</form><br>
		
		<?php
			if(isset($_GET['go']))
			{
				
		
			$t_id = mysqli_real_escape_string($con,$_GET['username']);
			 $getvalue = mysqli_query($con, "SELECT * FROM admission WHERE username ='$t_id'");
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
		<label for="inputEmail3" class="col-sm-2 control-label">Student Name</label>
		<div class="col-sm-10">
		  <input type = "text" name="username" value = "<?php if(isset($result['username'])&&($result['apply_status']==0))echo $result['username'];?>"  required>
		</div>
		</div>
		
		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
		  <input type = "text" name="email" value = "<?php if(isset($result['email'])&&($result['apply_status']==0))echo $result['email'];?>"  required >
		</div>
		</div>
		
		<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">GPA</label>
		<div class="col-sm-10">
		  <input type = "number" name="gpa" value = "<?php if(isset($result['gpa'])&&($result['apply_status']==0))echo $result['gpa'];?>"><br><br>
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
			
	<input type="hidden" name="e_id" value="<?php if(isset($a)) echo $a ; ?>">
		
			
	</form>	
	<?php 
			
			if(isset($_POST['accept']))
			{	
				
				$applied=1;
				$te_id = $_POST['e_id'];
				$name = $_POST['username'];
				$email = $_POST['email'];
				 
				$accept=mysqli_query($con,"update admission set apply_status = '$applied' WHERE username = '$te_id'");
				{
					echo  "<script type='text/javascript'>alert('Application accepted');
							window.location='approve_application_student.php';</script>";
                   if($accept)
					{
						$sql=mysqli_query($con,"INSERT into student(fname,email) VALUES('$name','$email')");
					}
				}
			}
			if(isset($_POST['reject']))
			{	
				$applied=2;
				 $te_id = $_POST['e_id'];
				 
				$accept=mysqli_query($con,"update admission set apply_status = '$applied' WHERE username = '$te_id'");
				{
					echo  "<script type='text/javascript'>alert('Application rejected');
					window.location='approve_application_student.php';</script>";

                   
				}
			}
			?>
	</div>
	
</div>	
</body>
</html>