<html>
<head>
<?php 
	session_start();
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
			die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"hackathon");
	$phone=$_SESSION['phone'];
	$generic_med=$_POST['gen_med'];
	$price=$_POST['price'];
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$choice=$_POST['choice'];
	if($choice=="add")
	{
	$q="insert into generic_medicine values($phone,'$generic_med',$price);";
	}
	else { $q="delete from generic_medicine where gen_med='$generic_med';";}
	if (!mysqli_query($con,$q))
			{
				die('Error: ' . mysqli_error($con));
			}
	
	mysqli_close($con);
?><script>
	function effect()
	{
		alert("Data uploaded successfully!");
		window.location.href="afterlogin.php";
	}
	
</script>
</head>
<body onload="effect()">
</body>
</html>