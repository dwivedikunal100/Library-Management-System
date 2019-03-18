<?php 
session_start();
if(!isset($_SESSION['adminusername']))
	header("Location:adminlogin.php");
?>
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
    
<body>
<div class="container" style="margin-top:40px;">
    <div class="well" style="background-color:#fafafa;">
 
          <!-- welcome admin and hbti logo -->
        <div class="row">
    <div class="col-lg-2 col-xs-2 col-md-2 col-sm-2">
      <center>
        <h3>WELCOME<br><kbd>admin</kbd> </h3></center>
        
            </div>
        <div class="col-lg-2 col-sm-2 col-md-1 col-xs-1"></div>
        <img src="images/hbtu-logo.png" >
    </div>

        <!--return book heading -->
        <h2 class="text-center text-info" style="margin-bottom:20px;"><b>
        RETURN BOOK FROM STUDENT</b></h2>
        
        
        <!--form for getting student record -->
        <div class="form-inline text-center">
<form action="" method="post">
    <div class="form-group">
        <label>
    <input type="text" name="rollno"  placeholder="Enter roll number" class="form-control">
</label>
            </div>
    
  <input type="submit" name="Search" value="Search Student" class="btn btn-primary">
  
        </form>
    </div>
        
        <br>
        
<?php 
if(isset($_POST['Search']))
{

	if($_POST['rollno']=="")
		echo "<script>window.alert (\"Field cannot be empty\")</script>";
	else
	{
		$dbhost="localhost";
		$dbuser="root";
		$con=mysql_connect($dbhost,"root","");
		if($con==false)
			die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
		$connectdb=mysql_select_db("project",$con);
		if($connectdb==false)
			die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");
		$query="select * from students where rollno=".$_POST['rollno'].";";
		$res=mysql_query($query,$con);	
		if($res==false)
			die("<script>window.alert (\"query wrong .Try again later.\")</script>");
		else
		{
			if(mysql_num_rows($res)>0)
			{ 
				while ($row=mysql_fetch_assoc($res)) 
				{
					
				$rollno=$row['rollno'];
				$name=$row['name'];
				$booksno=$row['bookno'];
				$bookname=$row['bookname'];
                $branch=$row['branch'];    
                    $_SESSION['rollnumber']=$rollno;
                    $_SESSION['bookname']=$bookname;
					break;
				}
                //evaluating books differently
                $tmp=0;
                $bkname=$bookname.",";
                $i=0;
                $booki[0]="";
                    $value="";
                 while($i<strlen($bkname))
                 {
                     $str=$bkname[$i];
                     if($str!=',')
                         $value=$value.$str;
                     else
                     {
                $booki[$tmp++]=$value; 
                     $value="";
                     }
                     $i++;
                 }     
                 //books are stored in $booki
               
                
			//display all info
    echo    "<h3 class=\"page-header text-center text-info\">SELECT BOOK</h3>";
    echo    "<table class=\"table  table-bordered\" >";
	echo	"<tr class=\"info \"><td><b>Name </b></td>"."<td>".$rollno."</td></tr>";
    echo	"<tr class=\"success\"><td><b>Roll Number </b></td>"."<td>".$name."</td></tr>";
    echo	"<tr class=\"info \"><td><b>Branch </b></td>"."<td>".$branch."</td></tr>";
    echo	"<tr class=\"success \"><td><b>Number of books issued </b></td>"."<td>".$booksno."</td></tr>";
            
            //displaying books the tricky part 
                if($booksno!=0)
                {
                echo "<form action=\"bookreturn.php\" method=\"post\">";
                 
        echo "<tr class=\"info\" ><th rowspan=\"".$booksno."\" ><b>Name of books issued </b></th>"."<td class=\"info\"><label class=\"text-info\"><input type=\"radio\" name=\"bookname\" class=\"radio-inline\" value=\"".$booki[0]."\" checked> ".$booki[0]."</label></td></tr>";
            $i=1;
            while($i<$booksno) {  
            echo "<tr><td class=\"info\"><label class=\"text-info\"><input type=\"radio\" name=\"bookname\" class=\"radio-inline\" value=\"".$booki[$i]."\"> ".$booki[$i]."</label></td></tr>";
            $i++;    
            }                          
            }
                //else None book issued
                else
     echo "<tr class=\"info\"><td><b>Names of book issued </b></td>"."<td>".$bookname."</td></tr>";               echo "</table>";
            
    if($booksno!=0)
      echo "<input type=\"submit\" name=\"submit\" value=\"Return this book\" class=\"pull-right  btn btn-primary\"><br></form>";
    
            }
			else
				echo "<br><center><h4>STUDENT ROLL NUMBER INVALID</h4></center>";
		}
	}
}

?>
</div>
</div>
</body>
</html>
