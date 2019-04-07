<?php
include_once 'WA_dbconnect.php';

// Start the session

session_start();

if(isset($_SESSION["username"])){
$username =  $_SESSION["username"];
}

if(isset($_POST['from11'])&
  isset($_POST['to11'])&
   isset($_POST['depart'])&
  isset($_POST['return'])&
  isset($_POST['passenger'])
  ){

	$from11=$_POST['from11'];
	$to11=$_POST['to11'];
	$depart=$_POST['depart'];
	$return=$_POST['return'];
	$passenger=$_POST['passenger'];
	
}



?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!------ Include the above in your HEAD tag ----------> 
<html>
<head>
<title>Staff Backend</title>
</head>

<body>
<h9 style="color: #ffffff; font-size: 20px; background-color: #0a1b4f;        line-height: 48px;display:grid;grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;grid-template-rows:48px;grid-template-areas:'Home Home Home Home Home About us Flight Deals Deals';grid-auto-columns:0px;grid-auto-rows:0px;grid-gap:0px;">
    <img src="../images/logos/WarpAirline_navlogo.png">



    <p><small><br></small></p>
</h9>
<div class="container"> 
    <div class="row"> 
        <div class="col-md-3 "> 
            <div class="list-group "> 
                <a href="WA_backend.php" class="list-group-item list-group-item-action action">Welcome</a> 
              
                <a href="WA_BE_Routes.php" class="list-group-item list-group-item-action">Routes</a> 
                
				<a href="WA_BE_Flights.php" class="list-group-item list-group-item-active" style="background-color: #0a1b4f;">Flights</a> 
				<a href="WA_BE_Passengers.php" class="list-group-item list-group-item-action">Passengers</a> 
				<a href="WA_BE_Members.php" class="list-group-item list-group-item-action">Members</a>

				<a href="../../index.php" class="list-group-item list-group-item-action">Home</a> 
				<a href="WA_process_signout.php" class="list-group-item list-group-item-action">Sign out</a> 
         
            </div>             
        </div>         
        <div class="col-md-9"> 
            <div class="card"> 
                <div class="card-body"> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <h4>All Flights of Warp Airline </h4> 
                            <hr> 
                      </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12">
						<div><a href="WA_BE_add_Flights.php"><img src="../images/icon/Add.png" width="24" height="24"> Add a new flight</a></div><hr>
						
                            <div> 
                                                                
                                <table>
                <col width="15%">
                <col width="15%">
                <col width="20%">
                <col width="20%">
                <col width="15%">
                <col width="15%">

                <tr>
					<th>Flight ID</th>
                    <th>Route ID</th> 
                    <th>Date</th>
                    <th>Depart Time</th>
                    <th>Arrive Time</th>
                    <th>Base Price</th>
                    <th>Status</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
				
				
                 <?php 
$q="SELECT * FROM `flights` where route_id in (SELECT route_id FROM `routes` where origin_airport in (SELECT airport_code FROM `airports` WHERE country_code IN (SELECT country_code FROM `countries` WHERE name = '$from11') ) and destination_airport in (SELECT airport_code FROM `airports` WHERE country_code IN (SELECT country_code FROM `countries` WHERE name = '$to11') ));";
if ($res=$mysqli->query($q))
{
	while ($row = $res->fetch_array())
	{
	
	echo '<td>'.$row['flight_id'].'</td>';
	echo '<td>'.$row['route_id'].'</td>';	
	echo '<td>'.$row['depart_time'].'</td>';
	echo '<td>'.$row['depart_time'].'</td>';
	echo '<td>'.$row['arrive_time'].'</td>';
	echo '<td>'.$row['base_price'].'</td>';
	echo '<td>'.$row['status_id'].'</td>';
	echo '<td>'.'<a href="WA_BE_flights_edit.php?flightsid='.$row['flight_id'].'">'. '<img src="../images/icon/Modify.png" width="24" height="24">' .'</a>'.'</td>';
	echo '<td>'.'<a href="WA_BE_flights.php?flightsid='.$row['flight_id'].'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
	echo '</tr>';
	}

	
}

?>
                                            
            </table>
                                                               
                                                              
                                                                
                            </div>                             
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div>         
    </div>     
</div>
</body>
</html>