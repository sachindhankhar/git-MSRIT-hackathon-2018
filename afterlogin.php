<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  $con=mysqli_connect("localhost","root","");
	if(!$con)
	{
			die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"hackathon");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
	}
	$_SESSION['phone']=$_SESSION['sess_user'];
	$query ="select fname from shopkeeper_details where phone=".$_SESSION['phone'].";";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result)
?>  
<!doctype html>  
<html>  
<head>  
<title>Welcome</title>  
    <style>   
        body{  
              
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h2 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
              
          
    </style>  
	
</head>  
<body>  
    <center><h1></h1></center>  
      
<h2>Welcome, <?php $res =$row['fname']; echo $res; ?>! <a href="logout.php">Logout</a></h2>  
<center><p>  
  Enter the medicines(Generic)  you want to advertise, with their price:
</p><br/>

<form action="medicine_details.php" method="post">
<table>
<tr><td>Choose action:</td><td>Add in database:<input type="radio" name="choice" value="add"></td><td>Delete from database:<input type="radio" name="choice" value="delete" ></td></tr>
<tr><td>Enter name of medicine:</td><td><input type="text" name="gen_med"></td></tr>
<tr><td>Enter price:</td><td><input type="number" name="price" placeholder="optional(if deleting)"></td></tr>
<tr><td><input type ="submit" value="Update"></td></tr>

</table>
</form>

</body>  
</html>  
<?php  
}  
?>  