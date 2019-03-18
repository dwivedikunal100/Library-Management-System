<?php  session_start();  
if(!isset($_SESSION['username']))
	header("Location:index.php");
if(isset($_SESSION['newacc'])){
echo "<script>
window.alert (\"Your Account has been succesfully created\")</script>";
unset($_SESSION['newacc']);
}
?>
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="aboutus.php">About Project</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
        <li><a href="logout.php"> LOGOUT</a></li>
       
      </ul>
    
        
    </div>
  </div>
</nav>

<html>
<head>
<link rel="icon" type="icon" href="icon.png"/>
	<title>LIBRARY MANAGEMENT SYSTEM</title>
<style type="text/css">
	body{
		background: url(images/bg1.jpg);
	 background-repeat: no-repeat;
	 background-size: cover;
	}
</style>

</head>
    
<body>
    <div class="container" style="margin-top:40px;">
<div class="well" style="background-color:#fafafa;">

<div class="col-lg-3 col-md-5 col-sm-5 col-xs-7">
    <h3 class="text-center"><b>WELCOME</b><br>
        <kbd><?php echo	$_SESSION['username'];?></kbd></h3>
</div>
    
<a href="index.php" ><img src="images/hbtu-logo.png" class="img"  ></a>

<br><br><br>
<div class="well text-center text-info">    
<h2>Your Account Information</h2>
    
<?php
    echo "<table class=\"table table-hover\" >";
	echo	"<tr class=\"info \"><td ><b>Name </b></td>"."<td>".$_SESSION['username']."</td></tr>";
    echo	"<tr class=\"success \"><td><b>Roll Number </b></td>"."<td>".$_SESSION['rollno']."</td></tr>";
    echo	"<tr class=\"info \"><td><b>Number of books issued </b></td>"."<td>".$_SESSION['bookno']."</td></tr>";
    echo	"<tr class=\"success \"><td><b>Name of books issued </b></td>"."<td>".$_SESSION['bookname']."</td></tr>";

echo "</table>";
?>
</div>    
<p>* A maximum of 5 books can be issued by each student</p>
  

   <a href="searchbooks.php" class="btn btn-primary btn-group-item right" >SEARCH BOOKS</a> 

    
    </div></div>
</body>
</html>
