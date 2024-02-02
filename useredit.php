<?php        
    session_start();
    include('connection.php');
    if(strlen($_SESSION['UserId']==0)) 
    {
    header('location:logout.php');
    } 
    else
    {   
        include ('connection.php');
        if(isset($_REQUEST['update']))
        {
            $fullname= $_REQUEST['fullname'];
            $fullname=ucwords($fullname);	
            $username= $_REQUEST['username'];
            $mobileno= $_REQUEST['mobileno'];
            $email= $_REQUEST['email'];
            $UserId=$_SESSION['UserId'];

            $update="UPDATE users SET fullname='$fullname', username='$username', mobileno='$mobileno', email='$email' where UserId='$UserId'";
            $res=mysqli_query($con,$update);
            if($res)
            {
                echo "<script>alert('Profile updated successfully!!!');</script>"; 
                echo "<script>window.location='home.php';</script>";
            }
            else          
            {
                echo "<script>alert('Profile not updated!!!');</script>"; 
                echo "<script>window.location='useredit.php';</script>";
            }
        }
?>
<?php
    include('connection.php');
    $UserId=$_SESSION["UserId"];
    $query="SELECT * FROM `users` WHERE UserId= '$UserId'";
    $res=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($res))
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit User</title>
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
                        Edit User
					</span>

					<span class="txt1 p-b-11">
						Fullname
					</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="text" name="fullname" value="<?php echo $row['fullname']?>" style="text-transform: capitalize;">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="text" name="username" value="<?php echo $row['username']?>">
						<span class="focus-input100"></span>
					</div>

                    <span class="txt1 p-b-11">
						Mobile No.
					</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="text" id="mobno" name="mobileno" value="<?php echo $row['mobileno']?>">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="email" name="email" value="<?php echo $row['email']?>">
						<span class="focus-input100"></span>
					</div>									

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="update" value="Update" onclick="return confirm('Are you sure?');">
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

<?php 
} 
}
?>