<?php
session_start();
echo "<script type=\"text/javascript\">";
echo "var x=window.confirm (\"Are you sure you want to delete the accounts\");";
echo "if(x==false)window.location=\"seeaccounts.php\";";
echo "</script>";
$count=0;
foreach ($_POST as $key => $value) {
if(is_int($key))
$count++;
}
if($count==0)
{
	$_SESSION['noaccountselected']=true;
header("Location:seeaccounts.php");
}

$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");


foreach ($_POST as $key => $value) {
if(is_int($key))
{
$query="delete from students where rollno=".$key.";";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot delete account\")</script>");
}
}


$_SESSION['accountdeleted']=true;
header("Location:seeaccounts.php");








?>