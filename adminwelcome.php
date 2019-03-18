<!DOCTYPE html>
<?php session_start(); ?>
<html>
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="aboutus.php">About Project</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
        <li><a href="adminlogout.php"> LOGOUT</a></li>
       
      </ul>
    
        
    </div>
  </div>
</nav> 
<body background="images/bg3.jpg">
<?php

if(!isset($_SESSION['adminusername']))
	header("Location:adminlogin.php");
if(isset($_SESSION['newbookadded'])){
	unset($_SESSION['newbookadded']);
	echo "<script>window.alert (\"New Book Added\")</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="icon" href="icon.png"/>
	<title>HBTU KANPUR LIBRARY</title>
<style type="text/css">
	body{
		background: url(images/bg3.jpg);
	 background-repeat: no-repeat;
	 background-size: cover;
	}
</style>

</head>
<body>
<div class="container" style="margin-top:40px;">
    <div class="jumbotron" style="background-color:#fafafa"><img src="images/hbtu-logo.png" style="margin-left:75px ">
<div style="float: left;">
<h3>WELCOME<br>
<center><kbd><?php echo	$_SESSION['adminusername'];?></kbd>
</center>
</h3>
</div>

<br><br><br>
        <center>
<div class="btn-group " style="margin-bottom:15px;">
<a href="addbook.php" class="btn btn-lg btn-primary ">Add Book</a>
<a href="deletebook.php" class="btn btn-lg btn-primary">Delete Book</a>
<a href="seeaccounts.php" class="btn btn-lg btn-primary">Check Student accounts</a>
<a href="returnbook.php" class="btn btn-lg btn-primary">Return book from student</a>
</div>
           

    <img src="images/lbsimg.jpg">
             </center>
    </div>
    </div>

</body>
</html>
