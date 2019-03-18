<!DOCTYPE html>
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

<div class="container" style="margin-top:40px;">
    <div class="well" style="background-color:#fafafa;">
<a href="adminlogin.php"><img src="images/hbtu-logo.png" style="margin-left:75px "></a>
<div style="float: left;">
<h3>WELCOME<br>
<center><kbd><?php  session_start();echo	$_SESSION['adminusername'];?></kbd>
</center>
</h3>
</div><br><br><br><br>
<h2 class=" text-info text-center">DELETE ACCOUNTS</h2>
 <?php 
if(!isset($_SESSION['adminusername']))
	header("Location:adminlogin.php");
if(isset($_SESSION['noaccountselected']))
{
echo "<script>window.alert (\"No account selected\")</script>";
unset($_SESSION['noaccountselected']);
}
if(isset($_SESSION['accountdeleted']))
{
	unset($_SESSION['accountdeleted']);
echo "<script>window.alert (\"Accounts are successfully deleted\")</script>";

}
?>

<?php 

$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");
$query="select * from students;";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot Create Your Account.Please enter valid values\")</script>");
else
{
	
if(mysql_num_rows($res)>0)
{ 
echo "<form action=\"deleteaccount.php\" method=\"post\">";
	echo "<center><div class=\"table \"><table border=\"solid\" class=\"table table-hover well\">";
	echo "<thead class=\" thead-default\" style=\"background-color:#f0f0f0\"><tr><th class=\"text-center\">Select</th><th class=\"text-center\">Rollno</th><th class=\"text-center\">NAME</th><th class=\"text-center\">Book No</th><th class=\"text-center\">Book name</th></tr></thead>";
	while ($row=mysql_fetch_assoc($res)) {
		echo "<center>";
		echo "<tr align=\"center\">";
	echo "<td>"."<input type=\"checkbox\" name=\"".$row['rollno']."\">"."</td>";
		echo "<td>".$row['rollno']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['bookno']."</td>";
		echo "<td>".$row['bookname']."</td>";
	echo "</tr>";
		echo "</div></center>";
	}
echo "</table></center><br>";
echo "<center><input type=\"submit\" name=\"submit\"class=\"btn btn-primary\" value=\"Delete Selected Accounts\"></center>";
echo "</form>";
}
else
	echo "<h3 class=\"well text-center\">Empty database</h3>";
}
?>
        </div>
        </div>
        </html>