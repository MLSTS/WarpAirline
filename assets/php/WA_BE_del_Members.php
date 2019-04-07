
<?php
include_once 'WA_dbconnect.php';

// Start the session

session_start();
$username =  $_SESSION["username"];

	$personid = $_GET['personid']; // group id
	require_once('WA_dbconnect.php');
	if (isset($personid)) {
		$q="UPDATE person SET status = 2, remark = '$username' WHERE person_id='$personid'";
		$q = strtolower($q);
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }
	   $mysqli->close();
	   //redirect
	   header("Location: WA_BE_Members.php");
	} 

?>
