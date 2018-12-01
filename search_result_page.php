<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<title>generic_medicine_list</title>
	<style>
	#divlogin{
			position: absolute;
				top:10%;
				left:32%;
				
				
				
				
		}
	
  td{
  	  padding: 0px 5px 0px 5px;
  }
</style>
</head>


<header><center><b><h2 class="margin"> AVAILABLE RETAILERS OF THIS MEDICINE</h2></b></center></header>
<nav> <br/><br/><br/>   </nav>
<section>
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
	
	$med_name=$_POST['medname'];
	$pcode=$_POST['pincode'];
	$p=(int)$pcode;
		//echo gettype($p);
		$pn=(int)($p%1000);
		$pn=($p-$pn)/1000;
	
	?><center>
	<table border="2">
	<?php
			$q="select phone,fname,lname,address,pincode,gen_med,price from shopkeeper_details natural join generic_medicine where gen_med in(select gmed_name from generic_med where(select count(bmed_name) from brand_med where bmed_name='".$med_name."')=(select count(gmed_name) from brand_med natural join generic_med where brand_med.bmed_name='".$med_name."' and brand_med.salt=generic_med.salt) and salt in (select salt from brand_med where bmed_name='".$med_name."'))and pincode like '".$pn."%' order by pincode asc;";
			$result=mysqli_query($con,$q);
	
	?><center>
	<table  cellspacing="50px" >
	<?php
		if(!$result) {die('Could not get data: ' . mysqli_error($con));}
 else if (mysqli_num_rows($result) > 0) {
													echo "<tr><td><h3>Phone_no</h3>  </td><td><h3>First name</h3> </td><td><h3>Last name </h3></td><td><h3>Address </h3> </td><td><h3> Pincode</h3></td><td><h3>Generic medicine </h3> </td><td><h3>Price </h3> </td></tr>";
			while($row = mysqli_fetch_array($result))
			
				{									
												
													echo "<tr>";
													echo"<td>".$row['phone']."</td>";
													echo"<td>".$row['fname']."</td>";
													echo"<td>".$row['lname']."</td>";
													echo"<td>".$row['address']."</td>";
													echo"<td>".$row['pincode']."</td>";
													echo"<td>".$row['gen_med']."</td>";
													echo"<td>".$row['price']."</td>";
													echo "</tr>";
				}
			}
			else{
				echo "NO DATA AVAILABLE";
			}
	mysqli_close($con);




?></table></center></section>
<footer>  </footer>
</body>
<body background="https://www.pixelstalk.net/wp-content/uploads/images1/HD-medicine-wallpapers.jpg" >

	<div id="divlogin"><center><b><h3 class="margin"> AVAILABLE RETAILERS OF THIS MEDICINE</h3></b></center></div>
 	<nav class="navbar navbar-inverse navbar-fixed-top">
 		<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Happy MEds</a>
		</div>
	
	<ul class="nav navbar-nav">
		<li><a href="purrfect.html">Home</a></li>
		<li><a href="#">About</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="signup.html">Signup <i class="fab fa-google-plus"></i></a></li>
		<li><a href="login.php">Login <i class="fas fa-user-alt"></i></a></li>
	</ul>
	
	</nav>
	
	</div>
</html>