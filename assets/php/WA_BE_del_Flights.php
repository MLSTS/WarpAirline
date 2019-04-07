
<?php
include_once 'WA_dbconnect.php';

// Start the session

session_start();
$username =  $_SESSION["username"];

	//2018-11-25 13:00:00 EDEF
	$flightsid = $_GET['flightsid']; 
	echo strlen($flightsid);
	echo $flightsid;
	if(strlen($flightsid) == '24')
	{
		$datetime = substr($flightsid,-24,19);
		$fid = substr($flightsid,-4);
	}
	if(strlen($flightsid) == '23')
	{
		$datetime = substr($flightsid,-23,19);
		$fid = substr($flightsid,-3);
	}

	require_once('WA_dbconnect.php');
	if (isset($flightsid)) {
		
		
		
		$q="UPDATE flights SET status = 2, remark = '$username' WHERE flight_id = '$fid' 
		and depart_time = '$datetime'";
		$q = strtolower($q);
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }
	   echo $q;
	   $mysqli->close();
	   //redirect
	   header("Location: WA_BE_Flights.php");
	} 

?>