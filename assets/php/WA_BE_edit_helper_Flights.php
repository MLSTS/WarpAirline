<?php
include_once 'WA_dbconnect.php';

// Start the session
session_start();
$username =  $_SESSION["username"];


?>

<?php
$flightsiddd = $_GET['flightid']; 
	//echo strlen($flightsid);
	//echo $flightsid;
	//echo $flightsiddd;
	if(strlen($flightsiddd) == '24')
	{
		//echo"hi";
		$datetime = substr($flightsiddd,-24,19);
		$fid = substr($flightsiddd,-4);
	}
	if(strlen($flightsiddd) == '23')
	{
		$datetime = substr($flightsiddd,-23,19);
		$fid = substr($flightsiddd,-3);
	}

	//require_once('WA_dbconnect.php');

	//echo $fid;
	//echo $datetime;			
?>	

<?php

$ppprice = $_POST['whyprice'];
$ppstatus = $_POST['whystatus'];


 ?>

									
<?php
$change="select status_id from flight_statuses where name = '$ppstatus'";
require_once('WA_dbconnect.php');
$resultnaja=$mysqli->query($change);
$rownaja = $resultnaja->fetch_array();

$innum = $rownaja['status_id'];

//
$qr="update flights set base_price='$ppprice' , status_id='$innum' where flight_id = '$fid' and depart_time = '$datetime' ";
$mysqli->query($qr);
if(!$mysqli->query($qr)){
			//echo "DELETE failed. Error: ".$mysqli->error ;
	   }
$mysqli->close();
header("Location:WA_BE_Flights.php");
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