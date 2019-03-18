<?php  session_start(); ?>

<html>
    <!-Common for all pages-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/HBTI_Logo.png">
    <title>LIBRARY MANAGEMENT SYSTEM</title>
    <link href="./Navbar Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <link href="./Navbar Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./Navbar Template for Bootstrap_files/navbar.css" rel="stylesheet">
    <script src="./Navbar Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
   <script src="./Navbar Template for Bootstrap_files/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Navbar Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Navbar Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
    </head>
  
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
           <a class="navbar-brand " href="#" ><img class=" img img-circle" src="images/lbslogo.png"></a>
      <a class="navbar-brand" href="index.php">LIBRARY MANAGEMENT SYSTEM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Project</a></li>
      </ul>
     
    </div>
  </div>
</nav>

<html>
<head>
	<title>LIBRARY MANAGEMENT SYSTEM</title>
	<link rel="icon" type="icon" href="icon.png"/>
</head>
<style type="text/css">
	body{
		background: url(images/bg1.jpg);
	 background-repeat: no-repeat;
	 background-size: cover;
	}	
</style>

<body >

<div class="container" style="margin-top:40px;">
    <div class="well" style="background-color:#fafafa;">
       <center><a href="index.php" ><img src="images/hbtu-logo.png" style="padding-bottom:15px;" ></a></center> 

<form action="register.php" method="post" class="well" >
<div class="form-group ">
    <label>NAME</label><input class="form-control" type="text" name="name" placeholder="Enter Name">
    </div>
  <div class="form-group ">  
      <label>BRANCH</label><input class="form-control" type="text" name="branch" placeholder="Enter Branch"></div>
<div class="form-group ">
    <label>ROLL NUMBER</label><input class="form-control" type="text" name="rollnumber" placeholder="Enter Roll Number"></div>
<div class="form-group ">
    <label>PASSWORD</label><input class="form-control" type="password" name="pswd" placeholder="Enter Password"></div>
<div class="form-group ">
    <label>CONFIRM PASSWORD</label><input  class="form-control" type="password" name="cnfrmpswd" placeholder="Confirm Password"></div>
<center><input type="submit" value="Register" class="btn btn-primary btn-lg"/></center>

  
        </form>
   
<h4 align="center" class="text-danger" >Make sure all the fields are correctly filled .Your account may be deleted if infromation entered is found invalid!</h4>



        </div>

</div>
</body>
    </html>
    </html>
</html>


<?php 

if(isset($_SESSION['username']))
header("location:welcome.php");

if(isset($_SESSION['incomplete']))
{unset($_SESSION['incomplete']);
	echo "<script>window.alert (\"Empty Fields are not allowed\")</script>";
}

if(isset($_SESSION['diff']))
{unset($_SESSION['diff']);
	echo "<script>window.alert (\"Password and Confrim Password are not same\")</script>";
}
?>