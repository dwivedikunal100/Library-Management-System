<?php
session_start();
echo "<script type=\"text/javascript\">";
echo "var x=window.confirm (\"Are you sure you want to delete the book from library\");";
echo "if(x==false)window.location=\"deletebook.php\";";
echo "</script>";
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");
$query="delete from books where isbn=".$_POST['isbnbook'].";";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot delete book\")</script>");

$_SESSION['bookdeleted']=true;
header("Location:deletebook.php");
?>