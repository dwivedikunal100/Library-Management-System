<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['rollno']);
unset($_SESSION['bookno']);
unset($_SESSION['bookname']);
header("Location:index.php");
?>