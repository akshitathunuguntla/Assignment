<?php        
    session_start();
    include('connection.php');
    if(strlen($_SESSION['UserId']==0)) 
    {
    header('location:logout.php');
    } 
    else
    {   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
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
				<?php
			        $UserId=$_SESSION["UserId"];
			        $query="SELECT * FROM users WHERE UserId='$UserId'";
			        $res=mysqli_query($con,$query);
			        while($row=mysqli_fetch_array($res))
			        {
			    ?>
				<span class="login100-form-title p-b-32" style="text-transform: capitalize;">
					welcome <?php echo $row['fullname'];?>
				</span>

				<span class="txt1 p-b-11" style="text-transform: none;">
						Username : <?php echo $row['username'];?>
				</span>
				<br/>
				<span class="txt1 p-b-11" style="text-transform: capitalize;">
                        Fullname : <?php echo $row['fullname'];?>
				</span>
				<br/>
                <span class="txt1 p-b-11" style="text-transform: capitalize;">
                        Mobile No. : <?php echo $row['mobileno'];?>
				</span>
				<br/>
				<span class="txt1 p-b-11" style="text-transform: none;">
						Email : <?php echo $row['email'];?>
				</span>

                <div class="container-login100-form-btn">
					<a class="login100-form-btn-edit" href="useredit.php">Edit</a> 
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" onclick="window.location.href = 'logout.php';">Logout</button> 
				</div>
				<?php 
			        } 
			    ?>
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
?>