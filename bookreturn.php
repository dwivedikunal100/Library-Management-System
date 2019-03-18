<?php
session_start();

$student=$_SESSION['rollnumber'];
$bookname=$_SESSION['bookname'];
$bookname=$bookname.",";

$i=0;
$value="";
$newbookname="";
while($i<strlen($bookname))
{
 $str=$bookname[$i];    
  if($str!=",")
      $value=$value.$str;
 else if($value==$_POST['bookname'])
      $value="";
    else{
        $newbookname=$newbookname.$value.",";
        $value="";
    }
      $i++;  
}
$newbookname=substr($newbookname,0,-2);
if($newbookname=="")
    $newbookname="None";
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");


//query 1
$query="update books set copiesleft=copiesleft+1 where name='".$_POST['bookname']."';";
//echo $query;
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot update bookdatabase\")</script>");


//query 2
$query="update students set bookno=bookno-1,bookname='".$newbookname."' where rollno=".$_SESSION['rollnumber'].";";
echo $query;
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot update student database\")</script>");

$_SESSION['bookreturned']=true;
header("Location:returnbook.php");



?>