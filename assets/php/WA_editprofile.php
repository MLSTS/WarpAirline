<?php
include_once 'WA_dbconnect.php';

// Start the session
session_start();
$username =  $_SESSION["username"];


?>

<?php

$fname =$_POST['fname'];
$lastname =$_POST['lastname'];
$dob =$_POST['dob'];
$gender =$_POST['gender'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$passport = $_POST['passport'];

$q="update person set passport='$passport', first_name='$fname' , last_name='$lastname' , dateofbirth='$dob' , gender='$gender' , email='$email' ,phone='$phone' where username='$username';";
$mysqli->query($q);

$mysqli->close();	

header("Location:../../person.php");
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
