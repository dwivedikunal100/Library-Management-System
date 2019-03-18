<?php
session_start();
if($_SESSION['bookno']==5)
{
$_SESSION['maximumbookreached']=true;
header("Location:searchbooks.php");
die("");
}


if($_POST['isbnbook']=="")
{
	$_SESSION['booknotselected']=true;
	header("Location:searchbooks.php");
die("");
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
$query="select name,copiesleft from books where isbn=".$_POST['isbnbook'].";";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot execute query.Try again later.\")</script>");
if(mysql_num_rows($res)>0)
	while ($row=mysql_fetch_assoc($res))
	{
		if($row['copiesleft']==0)
		{
			$_SESSION['notavailablebook']=true;
			header("Location:searchbooks.php");
			die("");
		}
		else
		{
			$_SESSION['toupdate']=$row['copiesleft'];
			$nameofbook=$row['name'];
		}
	}

$query="update books set copiesleft=".($_SESSION['toupdate']-1) ." where isbn=".$_POST['isbnbook'].";";

$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot update database.Try again later.\")</script>");

if($_SESSION['bookname']=="None")
	$_SESSION['bookname']="";
else
	$_SESSION['bookname']=$_SESSION['bookname'].",";

$query="update students set bookno=".($_SESSION['bookno']+1) .",bookname='".($_SESSION['bookname'].$nameofbook)."' where rollno=".$_SESSION['rollno'].";";
echo $query;
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot update student database.Try again later.\")</script>");



}
$_SESSION['bookno']++;
$_SESSION['bookname']=$_SESSION['bookname'].$nameofbook;
$_SESSION['isbn']=$_POST['isbnbook'];
$_SESSION['booknameissued']=$nameofbook;
header("Location:printreciept.php");

?>
