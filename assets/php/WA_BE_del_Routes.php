
<?php
include_once 'WA_dbconnect.php';

// Start the session

session_start();
$username =  $_SESSION["username"];

	$routesid = $_GET['routesid']; // group id
	require_once('WA_dbconnect.php');
	if (isset($routesid)) {
		$q="UPDATE routes SET status = 2, remark = '$username' WHERE route_id='$routesid'";
		$q = strtolower($q);
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }
	   $mysqli->close();
	   //redirect
	   header("Location: WA_BE_Routes.php");
	} 

?>
