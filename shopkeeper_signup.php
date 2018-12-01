<html>
<head>
<?php
	session_start();
	$con=mysqli_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"hackathon");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
	}
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$pincode=$_POST['pincode'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$q="insert into shopkeeper_details values('$fname','$lname',$phone,$pincode,'$password','$address');";
	if (!mysqli_query($con,$q))
			{	
				//header('Location:http://localhost/try/signup.html');
				//exit;
				die('Error: ' . mysqli_error($con));
			
			}
	
	mysqli_close($con);
		
	
?>

<script>
	function effect()
	{
		alert("Thanks for signing up!");
		window.location.href="purrfect.html";
	}
	
</script>
</head>
<body onload="effect()">
	
</body>
</html>