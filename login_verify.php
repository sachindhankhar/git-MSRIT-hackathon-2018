<?php
   
   session_start();
  echo "hello";
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
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // phone no. and password sent from form 
      
      $phone = mysqli_real_escape_string($con,$_POST['phone']);
      $password = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT phone FROM shopkeeper_details WHERE phone = $phone and password = '$password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $phone and $password, table row must be 1 row
		
      if($count == 1) {
         session_register("phone");
         $_SESSION['login_user'] = $phone;
         
         header("location: afterlogin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
		 echo $error;
      }
   }
?>