<?php
   
   session_start();
   $con=mysqli_connect("localhost","root","");
	if(!$con)
	{
			die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"hackathon");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select phone from shopkeeper_details where phone = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['phone'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
	  
   }
?>