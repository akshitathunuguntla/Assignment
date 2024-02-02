<?php 
session_start();
if(isset($_REQUEST['register']))
{
	include('connection.php'); 
	$fullname= $_REQUEST['fullname'];
	$fullname=ucwords($fullname);	
	$username= $_REQUEST['username'];
    $mobileno= $_REQUEST['mobileno'];
	$email= $_REQUEST['email'];
	$password=md5($_REQUEST['password']);

    // Email Exist or NOT
    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";  
    $res_email=mysqli_query($con,$check_email);
    $row_email=mysqli_num_rows($res_email);

    // Username Exist or NOT
    $check_username = "SELECT username FROM users WHERE username='$username' LIMIT 1";  
    $res_username=mysqli_query($con,$check_username); 
    $row_username=mysqli_num_rows($res_username);

    if($row_email>0)
    {
        echo "<script>alert('Email address is already exists. Please try with other email!!!');</script>";
    }   
    else if($row_username>0)
    {
        echo "<script>alert('Username already taken. Please try with other username!!!');</script>";
    }
    else
    {
        // Insert User / Registered User Data
        $query="INSERT INTO `chaintech_network__db`.`users` (`UserId`,`fullname`,`username`,`mobileno`,`email`,`password`) VALUES(NULL ,'$fullname','$username','$mobileno','$email','$password')";
        $res=mysqli_query($con,$query);
        if($res)
        {
            echo "<script>alert('Registration Successfully!!!');</script>";
            echo "<script>window.location='index.php';</script>";
        }
        else  
        {
            echo "<script>alert('Registration Failed!!!');</script>";
            echo "<script>window.location='register.php';</script>";
        }  
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="src/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="src/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="src/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="src/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">  
</head>
<body>
    	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="" method="POST"> 
					<span class="login100-form-title p-b-32">
						Registration Form
					</span>

					<span class="txt1 p-b-11">
						Fullname
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Fullname is required">
						<input class="input100" type="text" name="fullname" style="text-transform: capitalize;">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>

                    <span class="txt1 p-b-11">
						Mobile No.
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="text" id="mobno" name="mobileno" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="email" name="email" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div>
							<a href="index.php" class="txt3">
								Already have an account? Login
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="register" value="Register">
					</div>

				</form>
			</div>
		</div>
	</div>
	
	<script src="src/jquery/jquery-3.2.1.min.js"></script>
	<script src="src/animsition/js/animsition.min.js"></script>
	<script src="src/bootstrap/js/popper.js"></script>
	<script src="src/bootstrap/js/bootstrap.min.js"></script>
	<script src="src/select2/select2.min.js"></script>
	<script src="src/daterangepicker/moment.min.js"></script>
	<script src="src/daterangepicker/daterangepicker.js"></script>
	<script src="src/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>