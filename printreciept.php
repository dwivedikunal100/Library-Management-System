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
   
<body background="images/bg1.jpg">
    
 <div class="container">
    <div class="well" style="background-color:#f5f5f5">
     
     <h2 class="text-info text-center">LIBRARY MANAGEMENT SYSTEM</h2>
     <br>
       <center> <img src="images/hbtu-logo.png" ></center>
        <br>
    <h4 class="text-center header"><b>RECIEPT FOR ISSUE OF BOOK
       </b> </h4>
        <br>
        <h4 class="text-center">This reciept is to certify that student <u><b><?php echo $_SESSION['username']; ?></b></u> has issued the book named <u> <strong><?php echo $_SESSION['booknameissued']; ?></strong></u> with ISBN Number
            <u> <strong><?php echo $_SESSION['isbn']; ?></strong></u>
         
        </h4>
     <center>
        <button onclick=print() class="btn btn-primary">Print</button>  
        <a href="index.php" class="btn btn-primary">Home</a>
    <p>*Note the reciept will appear only once so kindly print the reciept.</p>
     </center>
         <br>
        <br>
     <p class="text-primary bg-primary  text-center">This reciept has to be shown at the book counter of the library</p>
     </div>
     
    </div>   
    </body>
</html>
