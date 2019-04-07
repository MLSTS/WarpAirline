
<?php
include_once 'WA_dbconnect.php';

// Start the session

session_start();
$username =  $_SESSION["username"];

	//BKKHEL2018-11-26 04:00:005
	$personid = $_GET['personid']; 
	echo strlen($personid);
	echo $personid;
	if(strlen($personid) == '26')
	{
		$fromap = substr($personid,-26,3);
		$toap = substr($personid,-23,3);
		$datetime = substr($personid,-20,19);
		$itiner = substr($personid,-1);
	}
	if(strlen($personid) == '27')
	{
		$fromap = substr($personid,-27,3);
		$toap = substr($personid,-24,3);
		$datetime = substr($personid,-21,21);
		$itiner = substr($personid,-2);
	}

	//require_once('WA_dbconnect.php');
	if (isset($personid)) {
		
$getflightid = "select flight_id from passengers_on_flights where flight_id in (select flight_num from routes where origin_airport = '$fromap' and destination_airport = '$toap')  ";
$resultee=$mysqli->query($getflightid);
$frormrow=$resultee->fetch_array();
$flightidd = $frormrow['flight_id'];

		
		$q="UPDATE passengers_on_flights SET status = 3, remark = '$username' WHERE itinerary_id = '$itiner' 
		and depart_time = '$datetime' and flight_id = '$flightidd'";
		$q = strtolower($q);
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }
	   echo $q;
	   $mysqli->close();
	   //redirect
	   header("Location: WA_managebookings.php");
	} 

?>