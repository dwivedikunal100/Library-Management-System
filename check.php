<?php 
session_start();
$name=$_POST['name'];
$password=$_POST['password'];
$dbhost="localhost";
$dbuser="root";

if($name=="" || $password=="")
{
	$_SESSION['incomplete']=true;
	header("location:index.php");
die("");
}

$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");
$query="select * from students;";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot fetch data.Try Later!\")</script>");
if(mysql_num_rows($res)>0)
	while ($row=mysql_fetch_assoc($res)) {
		if($row['name']==$name && $row['password']==$password)
		{
			$_SESSION['name']=$name;
			$_SESSION['username']=$name;
			$_SESSION['rollno']=$row['rollno'];
			$_SESSION['bookno']=$row['bookno'];
			$_SESSION['bookname']=$row['bookname'];
 			header("Location:welcome.php");
		die("");
        }
	}
$_SESSION['wrong']=true;
header("Location:index.php");
die("");
?>