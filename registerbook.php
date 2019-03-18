<?php 
session_start();
$bookname=$_POST['bookname'];
$authorname=$_POST['authorname'];
$isbn=$_POST['isbn'];
$totalcopies=$_POST['totalcopies'];
$description=$_POST['description'];
$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));



if($bookname=="" || $authorname=="" || $isbn=="" || $totalcopies=="" || $description=="")
{
	$_SESSION['incomplete']=true;
header("location:addbook.php");
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

$query="insert into books(isbn,name,author,totalcopies,copiesleft,image,description) values(".
$isbn.",'".$bookname."','".$authorname."',".$totalcopies.",".
$totalcopies.",'".$image."','".$description."');";





$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot add book.Please enter valid values\")</script>");
    
    
    
    

$_SESSION['newbookadded']=true;
header("location:adminwelcome.php");
}
?>