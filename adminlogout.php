<?php
session_start();
unset($_SESSION['adminusername']);
header("Location:index.php");
?>