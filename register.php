<?php 
session_start();
$name=$_POST['name'];
$branch=$_POST['branch'];
$rollnumber=$_POST['rollnumber'];
$pswd=$_POST['pswd'];
$cnfpswd=$_POST['cnfrmpswd'];



if($name=="" || $branch=="" || $rollnumber=="" || $pswd==""|| $cnfpswd=="")
{
	$_SESSION['incomplete']=true;
header("location:signup.php");
}
else if($pswd != $cnfpswd)
{
	$_SESSION['diff']=true;
header("location:signup.php");
}
else{
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");

//$query="insert into students(rollno,name,password,bookno,bookname) values(".
//$rollnumber.",'".$name."','".
//$pswd."',0,'none');";

$query="insert into students(rollno,name,password,bookno,bookname,branch) values(".

    $rollnumber.",'".$name."','".$pswd."',0,'None','".$branch."');";
echo $query;

$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot Create Your Account.Please enter valid values\")</script>");

			$_SESSION['name']=$name;
			$_SESSION['rollno']=$rollnumber;
			$_SESSION['bookno']=0;
			$_SESSION['bookname']="None";
			$_SESSION['username']=$name;
			$_SESSION['newacc']=true;
header("location:welcome.php");
}
?>