<?php 
session_start();
include('connection.php');
if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=md5($_REQUEST['password']);
    $query="select * from `chaintech_network__db`.`users` where email='".$email."'AND password='".$password."' limit 1"; 
    $res=mysqli_query($con,$query);
    $num= mysqli_num_rows($res);
    if($num>0)
    {
        $row=mysqli_fetch_array($res);
        $_SESSION['UserId']=$row['UserId'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];

        echo "<script>alert('You are logged in!!!');</script>";
        echo "<script>window.location='home.php';</script>";
    }
    else
    {
        echo "<script>alert('You Have Entered Incorrect Email OR Password!!!');</script>"; 
        echo "<script>window.location='index.php';</script>";
    }
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
						Login
					</span>

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
							<a href="register.php" class="txt3">
								Don't have an account? Register
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="login" value="Login">
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