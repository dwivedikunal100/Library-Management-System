<?php
$dbhost="localhost";
$dbuser="root";
$con=mysql_connect($dbhost,"root","");
if($con==false)
die("<script>window.alert (\"Cannot connect to Server.Try Later!\")</script>");

//creating database
/*$sql="CREATE DATABASE PROJECT";
$createdb=mysql_query($sql,$con);
if($createdb==false)	die("<script>window.alert (\"Cannot create database.Try Later!\")</script>");
*/
//already created

//connecting to database
$connectdb=mysql_select_db("project",$con);
if($connectdb==false)die("<script>window.alert (\"Cannot connect to Database.Try Later!\")</script>");


//creating table
/*
$query="create table students(rollno int(10) primary key,name varchar(10),password varchar(10),bookno int(2),bookname varchar(40));";
$res=mysql_query($query,$con);
if($res==false)die("<script>window.alert (\"Cannot create Table.Try Later!\")</script>");
*/
//already created





?>