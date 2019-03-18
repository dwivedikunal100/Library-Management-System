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
  <nav class=" navbar navbar-inverse navbar-fixed-top">
      
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
           <li><a></a></li>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="aboutus.php">About Project</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right ">
     <li><button type="button" data-toggle="modal" class="btn navbar-btn btn-success" data-target="#login" style="border-radius:0 0 0 0;">Log In</button></li>
          <li><button type="button"  class="btn navbar-btn btn-primary" onclick="window.location.href='signup.php'" style="border-radius:0 0 0 0;">Sign Up</button></li>
       
        <li><button type="button"  class="btn navbar-btn btn-danger" onclick="window.location.href='adminlogin.php'" style="border-radius:0 0 0 0;">Admin</button></li>
            
      </ul>
    </div>
  </div>
</nav>
   
     <body style="background:url(images/bg.jpg)">
    
    
      
                       
       <div class=" container" > 
          
            <div class=" text-center" style="margin-top:45px; border-radius:0 0 0 0;">
        <h1 class=" text-info well" ><big>L</big>IBRARY <big>M</big>ANAGEMENT <big>S</big>YSTEM</h1>
         </div>

     
          
<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/3.jpg" alt="Flower">
    </div>

    
  </div>


</div>
           
         
            
    
   
        
      
        <div class="well" >
            <h3 class="text-info"> <b>Library</b> is organized for use and maintained by a public body, an institution, a corporation, or a private individual. Public and institutional collections and services may be intended for use by people who choose not to—or cannot afford to—purchase an extensive collection themselves, who need material no individual can reasonably be expected to have, or who require professional assistance with their research. In addition to providing materials, libraries also provide the services of librarians who are experts at finding and organizing information and at interpreting information needs. Libraries often provide quiet areas for studying, and they also often offer common areas to facilitate group study and collaboration. Libraries often provide public facilities for access to their electronic resources and the Internet. Modern libraries are increasingly being redefined as places to get unrestricted access to information in many formats and from many sources. They are extending services beyond the physical walls of a building, by providing material accessible by electronic means, and by providing the assistance of librarians in navigating and analyzing very large amounts of information with a variety of digital tools.
            </h3>
        
        </div>
        
       </div>
         
     
       <!--STUDENT LOGIN -->
       <div class="modal fade" id="login" >
         <form action ="check.php" method="post" role="form" >
             <div class="modal-dialog well" >
        <div class="modal-header">
        
              <h2 class="modal-title text-center text-success">STUDENT LOGIN</h2>
             
             </div>
            <div class="modal-body">
                <label class="control-label" >User Id:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name"/>
                <label class="control-label">Password:</label>
                <input type="Password" name="password" class="form-control " placeholder="Enter password"/>
                <br>
                </div> 
                 <div class="modal-footer">
                     <input type="Submit" value="Log In" class="btn btn-primary "/>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               
              </div>
                 </div>
               </form>
         </div>
 
       
       
       
       
       
    </body>
    </html>
    

    <?php
    //$_SESSION['wrong'] is set when user enters invalid login details
if(isset($_SESSION['wrong']))
{
	unset($_SESSION['wrong']);
	echo "<script>window.alert (\"Wrong UserName or Password\")</script>";
}

 //$_SESSION['incomplete'] is set when user doesnot fill any entry
    if(isset($_SESSION['incomplete']))
{
	unset($_SESSION['incomplete']);
	echo "<script>window.alert (\"Fields cannot be empty\")</script>";
}


/*
$_SESSION['username'] is set when a student logins successfully 
$_SESSION['adminusername'] is set when administrator logins successfully
*/
    // If $_SESSION['username'] is set redirect page to welcome.php
if(isset($_SESSION['username']))
  echo "<script>window.location=\"welcome.php\";</script>";   
//	header("Location:welcome.php");
     // If $_SESSION['adminusername'] is set redirect page to adminwelcome.php
if(isset($_SESSION['adminusername']))
         echo "<script>window.location=\"adminwelcome.php\";</script>";
	//header("Location:adminwelcome.php");

?>
