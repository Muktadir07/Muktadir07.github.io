<!DOCTYPE html>
<html lang="en">
<head>
 <title>teacher application </title>
  <meta charset="utf-8">
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

  <script>
  function ValidateRegistrationForm()
{
    var name     =ApplyForm.tname;
    var email    =ApplyForm.email;
    var pass    =ApplyForm.password;
	var cpass    =ApplyForm.cpassword;
    var dept     =ApplyForm.department;
    if (name.value == "")
    {
        window.alert("Please Enter Your Full Name.");
        name.focus();
        return false;
    }
    
   if (!/^[a-zA-Z]*$/g.test(name.value)) {
        alert("Invalid characters");
        name.focus();
        return false;
    }


  if (pass.value == "")
    {
        window.alert("Please enter your Password.");
        pass.focus();
        return false;
    }
   if (pass.value.length <6)
    {
        window.alert("Password Atleast 6 Character Long.");
        pass.focus();
        return false;
    }
	 if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(pass.value)) {
        alert("Invalid password there must be atleast 1 upper case or 1 lower case letter and A digit");
        pass.focus();
        return false;
    }
	if (cpass.value == "")
    {
        window.alert("Please confirm your Password.");
        cpass.focus();
        return false;
    }
 if (cpass.value!= pass.value) {
        alert("Password does not match");
        cpass.focus();
        return false;
    }
    if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

   if (dept.value == "")
    {
        window.alert("Please enter your Department.");
        dept.focus();
        return false;
    }

 
    return true;
}

function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>
<body>
<div class="container">

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
include "Connection.php";
         $tname     =$_POST['tname'];
            
          $pass    =$_POST['password']; 
         $email    =$_POST['email'];
        
         $dept    =$_POST['department'];



 $query="select * from teacher_application where t_name='$tname'";
 $Result=mysqli_query($con,$query);
 $exist=mysqli_num_rows($Result);


if(!$exist){

       
         $appl_stat=0;

         $query="insert into teacher_application(t_name,t_password,t_email,t_department,apply_status) values('$tname','$pass','$email','$dept','$appl_stat')";
         if (mysqli_query($con, $query))
          {
            echo '<script language="javascript">';
            echo 'alert("Registration successfully")';
            echo '</script>';
            

            }

      else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
          }

     
      }
      else
      {
            echo '<script language="javascript">';
            echo 'alert("Already an application sent")';
            echo '</script>';
      }
    }


?>
<br>
<form method="POST"  action="#" role="form" enctype="multipart/form-data" name="ApplyForm" onsubmit="return ValidateRegistrationForm();" >
			<label>Faculty Name</label>
              <input type="text" name="tname" placeholder="Input Faculty Name"><br><br>
			 <label>password</label>
			 <input type="password" name="password" placeholder="Input password" ><br><br>
			 <label>Confirm password</label>
			 <input type="password" name="cpassword" placeholder="Confirm password" ><br><br>
			 <label>Email</label>
			 <input type="text" name="email" placeholder="Imput a valid email"><br><br>
			 <label>Department</label>
			 <input type="text" name="department" placeholder="Department"><br><br>
			 <input type="submit" name="submit" value="Apply"/>
			 
			 

			 
</form>




  

</div>
</body>
</html>

