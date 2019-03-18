<?php session_start(); 
if(!(isset($_SESSION['adminusername'])))
header("location:index.php");

if(isset($_SESSION['bookdeleted']))
{
    echo "<script>window.alert (\"Book successfully deleted\")</script>";
unset($_SESSION['bookdeleted']);
}
?>
<!--php ends -->

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


<body >
<div class="container" style="margin-top:40px;">
<div class="well" style="background-color:#fafafa">
  
    <!-- welcome admin and hbti logo -->
    <div class="row">
    <div class="col-lg-2 col-xs-2 col-md-2 col-sm-2">
      <center>
        <h3>WELCOME<br><kbd>admin</kbd> </h3></center>
        
            </div>
        <div class="col-lg-2 col-sm-2 col-md-1 col-xs-1"></div>
        <img src="images/hbtu-logo.png" >
    </div>
   
    <!-- delete book heading -->
     <h2 class=" text-center text-info" style="margin-bottom:25px;">DELETE BOOK</h2>

    <!-- form for search by isbn number -->
    <div class="form-inline text-center">
    <form action="" method="post" >
    <div class="form-group">
        <label>ISBN</label>
        <input type="text" name="searchvalue" class="form-control" placeholder="Enter ISBN Number">
     </div>
   <div class="form-group"> 
        <input type="submit" name="search" value="Search Book" class="btn btn-primary" >
        </div>
  </form>
</div>
   <br>
    <!-- Displaying books database -->
<?php
    //displaying books by default
if(!(isset($_POST['search']))) 
{
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");
$query="select * from books;";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot Cannot  to database.Try again later.\")</script>");
else
{
	
if(mysql_num_rows($res)>0)
{ 
        
    echo "<div class=\" table \"><form action=\"confirmdelete.php\" method=\"post\">";
	echo "<center><table class=\"table table-striped well\" border=\"solid\" >";
	echo "<thead class=\"thead-default\" style=\"background-color:#f0f0f0; \"><tr><th>Select</th><th>ISBN</th><th>NAME</th><th>Author</th><th>Number of copies</th></tr></thead>";

	while ($row=mysql_fetch_assoc($res)) {
		echo "<center>";
		echo "<tr align=\"center\">";
	echo "<td>"."<input type=\"radio\" name=\""." isbnbook"."\" value=\"".$row['isbn']."\">"."</td>";
		echo "<td>".$row['isbn']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['author']."</td>";
        if($row['copiesleft']==0)
             echo "<td class=\"danger\">".$row['copiesleft']."</td>";
        else
        echo "<td class=\"success\">".$row['copiesleft']."</td>";
		
		
	echo "</tr>";
		echo "</center>";
	}
echo "</table></div>";
echo "<br><br><input type=\"submit\" name=\"submit\" value=\"Delete Selected Book\" class=\"btn btn-primary btn-lg \">";
echo "</form></center>";

}
else
	echo "<h4 class=\"well text-center\">Empty database</h4>";


}

}
else
{
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");


$query="select * from books where isbn=".$_POST['searchvalue'].";";

$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot Cannot  to database.Try again later.\")</script>");
else
{
	
if(mysql_num_rows($res)>0)
{ 
echo "<form action=\"confirmdelete.php\" method=\"post\">";
	echo "<div class=\" table \"><center><table class=\"table table-striped well\" border=\"solid\" >";
	echo "<thead class=\"thead-inverse \"><tr><th>Select</th><th>ISBN</th><th>NAME</th><th>Author</th><th>Availabilty</th></tr></thead>";

	while ($row=mysql_fetch_assoc($res)) {
		echo "<center>";
		echo "<tr align=\"center\">";
	echo "<td>"."<input type=\"radio\" name=\""." isbnbook"."\" value=\"".$row['isbn']."\">"."</td>";
		echo "<td>".$row['isbn']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['author']."</td>";
		if($row['copiesleft']!=0)
		echo "<td class=\"success\">".$row['copiesleft']."</td>";
	else
		{echo "<td class=\"danger\">".$row['copiesleft']."</td>";
}
	echo "</tr>";
		echo "</center>";
	}
echo "</table></div>";
echo "<br><br><input type=\"submit\" name=\"submit\" value=\"Delete book\" class=\"btn btn-primary btn-lg\">";
echo "</form></center>";

}
else
	echo "<center><p class=\"well\"><b>No book found based on search</b></p></center>";
}


}
?>
    <!-- php ends -->


    

    
</div>
</div>
</body>
</html>