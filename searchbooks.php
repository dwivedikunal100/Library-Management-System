<?php  session_start(); 
if(!isset($_SESSION['username']))
	header("Location:index.php");?>

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
        <li><a href="welcome.php">Home</a></li>
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
    <h3 class="text-center"><b>WELCOME</b><br><kbd><?php echo	$_SESSION['username'];?></kbd></h3>
</div>
    
<a href="index.php" ><img src="images/hbtu-logo.png" class="img"  ></a>


<br><br><br>

<center>
<form action="" method="post" style="margin-bottom:30px;">
	
<div class="radio-inline">
    <label><input type="radio" name="searchvalue"  value="isbn" class="active">ISBN NUMBER</label></div>
<div class="radio-inline">
    <label><input type="radio" name="searchvalue" value="name" checked>BOOK NAME</label></div>
<div class="radio-inline">
    <label><input type="radio" name="searchvalue" value="author">AUTHOR NAME</label></div>
<br>
    <div class="col-lg-3"></div>
  <div class="col-lg-6"><input type="text" name="searchthis" class="form-control"></div>  
<div class="col-lg-3"><input type="Submit" name="submit" value="Search Books" class="btn btn-default"></div>
</form>
</center>
<br>
<br>
<div style="margin-left:40px;margin-right:40px;">
    
<?php

if(isset($_SESSION['booknotselected']))
{unset($_SESSION['booknotselected']);
echo "<script>window.alert (\"No Book Selected\")</script>";
}
if(isset($_SESSION['notavailablebook']))
{unset($_SESSION['notavailablebook']);
echo "<script>window.alert (\"Book is not available\")</script>";
}
if(isset($_SESSION['maximumbookreached']))
{unset($_SESSION['maximumbookreached']);
echo "<script>window.alert (\"You cannot issue more than 5 books\")</script>";
}

//after searching a book
if(isset($_POST['submit']))
{

$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");

if($_POST['searchvalue']=="isbn")
$query="select * from books where isbn=".$_POST['searchthis'].";";
else
$query="select * from books where ".$_POST['searchvalue']."='".$_POST['searchthis']."';";	


$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot Cannot  to database.Try again later.\")</script>");
else
{
	
if(mysql_num_rows($res)>0)
{ 
    
  echo "<div class=\" \">";
    echo "<form action=\"issuebook.php\" method=\"post\">";
	while ($row=mysql_fetch_assoc($res)) {
		
     
        echo "<div class=\" well row\" style=\"background-color:#fff;\">";
      
       echo "<div class=\"col-lg-2 col-md-2 col-sm-4\">";  
        echo '<img style="height:200px; " class="img img-thumbnail img-responsive  " src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
        echo "</div>";
       
       echo "<div  class=\" col-lg-8 col-md-8 col-sm-8\">";
        echo "<p><b>Name:</b>".$row['name']."</p>";
		echo "<p><b>Author:</b> ".$row['author']."</p>";
        echo "<p><b>ISBN Number:</b> ".$row['isbn']."</p>";
       echo "<p><b>Description:</b> ".$row['description']."</p>";
        echo "</div>";
     
       echo "<div  class=\" col-lg-2 col-md-2 \">";
        if($row['copiesleft']>0)
        {
            echo "<button style=\"width:170px;margin-top:170px;\" type=\"submit\" name=\"isbnbook\" class=\"btn btn-success pull-right \" value=\"".$row['isbn']."\">Issue Book</button>";
         
        }
        else
             echo "<a  style=\"width:170px;margin-top:170px;\" class=\"btn btn-danger pull-right disabled \" >Not Available</a>";
    
    echo "</div></div>";
        
        
        
        
        
        /*   
        echo "<center>";
		echo "<tr align=\"center\">";
	echo "<td>"."<button type=\"submit\" name=\""." isbnbook"."\" value=\"".$row['isbn']."\">"."</td>";
		echo "<td>".$row['isbn']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['author']."</td>";
		if($row['copiesleft']>0)
		echo "<td class=\"success text-success\">AVAILABLE</td>";
	else
		{echo "<td class=\"danger text-danger\">NOT AVAILABLE</td>";
}
	echo "</tr>";
		echo "</center>";
	*/
    }
    echo "</form>";
echo"</div>";
}
else
	echo "<center><h4 class=\"well\"><b>No book found based on search</b></h4></center>";
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
$query="select * from books;";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot Cannot  to database.Try again later.\")</script>");
else
{
    
if(mysql_num_rows($res)>0)
{ 
    //Start Viewing 
    
    echo "<div class=\" \">";
    echo "<form action=\"issuebook.php\" method=\"post\">";
	while ($row=mysql_fetch_assoc($res)) {
		
     
        echo "<div class=\" well row\" style=\"background-color:#fff;\">";
      
       echo "<div class=\"col-lg-2 col-md-2 col-sm-4\">";  
        echo '<img style="height:200px; " class="img img-thumbnail img-responsive  " src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
        echo "</div>";
       
       echo "<div  class=\" col-lg-8 col-md-8 col-sm-8\">";
        echo "<p><b>Name:</b>".$row['name']."</p>";
		echo "<p><b>Author:</b> ".$row['author']."</p>";
        echo "<p><b>ISBN Number:</b> ".$row['isbn']."</p>";
       echo "<p><b>Description:</b> ".$row['description']."</p>";
        echo "</div>";
     
       echo "<div  class=\" col-lg-2 col-md-2 \">";
        if($row['copiesleft']>0)
        {
            echo "<button style=\"width:170px;margin-top:170px;\" type=\"submit\" name=\"isbnbook\" class=\"btn btn-success pull-right \" value=\"".$row['isbn']."\">Issue Book</button>";
         
        }
        else
             echo "<a  style=\"width:170px;margin-top:170px;\" class=\"btn btn-danger pull-right disabled \" >Not Available</a>";
    
    echo "</div></div>";
        
        
        
        
        
        /*   
        echo "<center>";
		echo "<tr align=\"center\">";
	echo "<td>"."<button type=\"submit\" name=\""." isbnbook"."\" value=\"".$row['isbn']."\">"."</td>";
		echo "<td>".$row['isbn']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['author']."</td>";
		if($row['copiesleft']>0)
		echo "<td class=\"success text-success\">AVAILABLE</td>";
	else
		{echo "<td class=\"danger text-danger\">NOT AVAILABLE</td>";
}
	echo "</tr>";
		echo "</center>";
	*/
    }
    echo "</form>";
echo"</div>";
    
}
else
	echo "<center><h4 class=\"well\">Empty database</h4></center>";
}
}



?>
    </div>
</div>
</div>
</body>
</html>
    </html>
</html>
