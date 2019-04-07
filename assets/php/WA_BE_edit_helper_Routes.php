<?php
include_once 'WA_dbconnect.php';

// Start the session
session_start();
$username =  $_SESSION["username"];


$routeeidd = $_GET['arouteid']; 
		

$aaacrafts = $_POST['aircid'];
$aaadistancem = $_POST['distancem'];


$qr="update routes set aircraft_id='$aaacrafts' , destance_miles='$aaadistancem' where route_id = '$routeeidd'";
$mysqli->query($qr);
if(!$mysqli->query($qr)){
			//echo "DELETE failed. Error: ".$mysqli->error ;
	   }
$mysqli->close();
header("Location:WA_BE_Routes.php");
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>