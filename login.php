<!doctype html>  
<html>  
<head>  
<title>Login</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style type="text/css">
    <style>   
        body{  
              
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: yellow ;  
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h3 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}
#divlogin{
            position: absolute;
                top:23%;
                left:30.8%;
                right:30.6%;
                bottom:24%;
                
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 20px;
                padding-right:20px;
                background-color: white;
                backface-visibility: 40%;

                
        }

body {
    background-image: url("http://img01.deviantart.net/b2a5/i/2012/285/a/9/logon_screen_fusion_w7_by_dshepe-d5hl439.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
} 
.yo{ right: 50%;
    }
 </style>  
}
</head>  
<body>  
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Happy MEds</a>
        </div>
    
    <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
    </ul>
    
    
    </nav>
    </div>  
     <h1> 

<div id="divlogin">
    <h2><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> LOGIN HERE</strong></h2> <form action="" method="POST"> <div class='yo'> 
<p>Mobile no: <input type="tel"class="form-control" name="user"></p>  
<p>Password: <input type="password" class="form-control"name="pass"></p>   
<input type="submit" value="Login"  class="btn btn-primary" name="submit" />
</form></div>  
<?php  
if(isset($_POST["submit"])){  }
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'hackathon') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM shopkeeper_details WHERE phone=".$user." AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['phone'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: afterlogin.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    ?><script> alert("All fields are required");</script> <?php
}  
  
?>  
</body>  
</html>   
