<!DOCTYPE html>
<?php session_start(); ?>

<html>
    <!-Common for all pages-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>LIBRARY MANAGEMENT SYSTEM</title>
    <!-- Bootstrap core CSS -->
    <link href="./Navbar Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Navbar Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./Navbar Template for Bootstrap_files/navbar.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Navbar Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script src="./Navbar Template for Bootstrap_files/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Navbar Template for Bootstrap_files/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
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
      <ul class="nav navbar-nav ">
        <li ><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
   
    </div>
  </div>
</nav>
     


<html>
<head>
<link rel="icon" type="icon" href="icon.png"/>
	<title>HBTU KANPUR LIBRARY</title>
</head>
<style type="text/css">
	body{
		background: url(images/bg.jpg);
	 background-repeat: no-repeat;
	 background-size: cover;
	}
	

</style>
<body style="background:url(images/bg.jpg)">
<div class="container">

<br><br><br><br><br><br>
    <div class="col-md-4 col-lg-4 col-sm-5 row " ></div>
<div class="col-md-5 col-lg-5 col-sm-6 row jumbotron" style="background:url(images/bg3.jpg)">

<form action ="admincheck.php" method="post">
<center><h2 style="color:white;">ADMINISTRATOR LOGIN</h2></center>
 <label class="control-label" >User Id:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name"/>
                <label class="control-label">Password:</label>
                <input type="Password" name="password" class="form-control " placeholder="Enter password"/>
    <br>
    <input type="Submit" value="Log In" class="btn btn-primary " />

</form>
</div>
    </div>
</body>

 </html>


<?php 
if(isset($_SESSION['adminwrong']))
{
	unset($_SESSION['adminwrong']);
	echo "<script>window.alert (\"Wrong UserName or Password\")</script>";
}

if(isset($_SESSION['adminloginfields']))
{
	unset($_SESSION['adminloginfields']);
	echo "<script>window.alert (\"Fields cannot be empty\")</script>";
}

if(isset($_SESSION['adminusername']))
	header("Location:adminwelcome.php");

?>