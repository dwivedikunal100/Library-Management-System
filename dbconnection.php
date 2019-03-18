<?php
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)die("Not connected");
else
echo "Data base connected";

//creating database
/*$sql="CREATE DATABASE SOME";
$rev=mysql_query($sql,$con);
if($rev==false)die("Not Created");
else
echo "Data base created";
*/
//connecting to database
$see=mysql_select_db("some",$con);
if($see==false)die("NI hua connect");



//creating table
//$query="create table fissrt(name varchar(10),ename varchar(10));";

//inserting in table
//$query="insert into fissrt(name,ename) values('yup','asd');";

//selecting from table
$query="select * from fissrt;";


echo getenv("HTTP_USER_AGENT");

$res=mysql_query($query,$con);
if($res==false)die("Ni hua");
else
echo "Ho gya";
//displaying result when selected from table
/*if(mysql_num_rows($res)>0)
	while ($row=mysql_fetch_assoc($res)) {
		echo $row['name']."</br>";
		echo $row['ename'];

	}
*/



//close database connection
mysql_close($con);


//redirecting webpage
//header("Location:register.php");


?>

<!--SESSION RELATED-->
<?php 
session_start();
$_SESSION['ads']=54;
if(isset($_SESSION['ads']))echo"correct";



?>

<!--
<table cellpadding="30" height="30%" width="30%" border="3px">
<tr><th>NAME</th><th>AGE</th></tr>
<tr rowspan=2><td colspan=2>NAME</td><td>AGE</td></tr>
<tr><td>NAME</td><td>AGE</td></tr>
</table>
-->