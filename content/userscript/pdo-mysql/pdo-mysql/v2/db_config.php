<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Include the database connection file
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "demo";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
?>