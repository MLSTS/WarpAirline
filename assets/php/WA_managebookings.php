<!doctype html>

<?php
error_reporting(E_ERROR | E_PARSE);
include_once 'WA_dbconnect.php';

// Start the session

session_start();



$username =  $_SESSION["username"];


$formember="select member from person where username = '$username' and member = 'E'";
$resultformember=$mysqli->query($formember);
$fromformember=$resultformember->fetch_array();
$member = $fromformember['member'];


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!------ Include the above in your HEAD tag ----------> 
<html>
<head>
<title>My flight</title>
</head>

<body>
<h9 style="color: #ffffff; font-size: 20px; background-color: #0a1b4f;        line-height: 42px;display:grid;grid-template-columns:1fr 1fr 0.2fr;grid-template-rows:48px;grid-template-areas:'Home Home Home Home Home About us Flight Deals Deals';grid-auto-columns:0px;grid-auto-rows:0px;grid-gap:0px;">
    <img src="../images/logos/WarpAirline_navlogo.png">
   <?php
			
if($username){
				if($username == "MatitL" || $username == "PintusornS" ||$username == "WasuponP" ||$username == "NatthanichaS"||$username == "TrongtrongV" || $member == "E"){?>
					<p align="right" style="color:#ffffff;">admin: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a>
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
<?php } 
else{ ?> 
					<p align="right" style="color:#ffffff;">username: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a>
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
				<?php }
 } ?>


    <p><small><br></small></p>
</h9>


<div class="container"> 
    <div class="row"> 
        <div class="col-md-3 "> 
            <div class="list-group "> 
              
				<a href="../../index.php" class="list-group-item list-group-item-action">Home</a> 
         
            </div>             
        </div>         
        <div class="col-md-9"> 
            <div class="card"> 
                <div class="card-body"> 
                    <div class="row"> 
                        <div class="col-md-12"> 

<?php
$WAAF_passengeremail = $_GET['WAAF_passengeremail'];
$WAAF_passengerlastname = $_GET['WAAF_passengerlastname'];
$query = "SELECT email FROM passengers_on_flights WHERE email = '$WAAF_passengeremail' ";
$res = $mysqli->query($query);
$row1 = $res->fetch_array();
$email = $row1['email'];

$q="SELECT DISTINCT `itinerary_id` as itinid , p.flight_id as fliid, SUBSTRING(p.depart_time, 1, 10) as departdate,
SUBSTRING(p.depart_time, 11, 9) as departtime ,SUBSTRING(f.arrive_time, 11, 9) as arrivetime , 
c.name as seatclass , p.seat_num as seatno, fs.name as stt, ps.username, r.origin_airport as originalap, r.destination_airport as destap from passengers_on_flights p, 
flights f, seat_classes c, aircraft_seats a , flight_statuses fs , person ps, countries cts, airports aps , 
routes r where p.flight_id=f.flight_id and p.depart_time=f.depart_time and p.seat_num = a.seat_num and a.class_id = c.class_id 
and f.status_id = fs.status_id and ps.username = '$username' and f.status_id != '2' and p.route_id=r.route_id and p.email = '$email'
order by departdate ASC limit 0,1";

$result=$mysqli->query($q);
$row=$result->fetch_array();		
						
?>
                            <h4>Your Upcoming flight</h4> 
                            <hr> 
                        </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12"> 
<table>
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="20%">
				<col width="10%">
                <col width="10%">
                <col width="10%">
				<col width="10%">

                <tr>
                    <th>First name</th> 
                    <th>Last name</th>
                   
                   
                    <th>Flight ID</th>
                    <th>Depart time</th>
					<th>Passport</th>
                    <th>Price</th>
                    <th>status</th>
					<th>cancel</th>
                </tr>
				
				
                 <?php
$q="SELECT pof.*, p.first_name, p.last_name, p.member, p.email from passengers_on_flights pof, person p where pof.email=p.email and pof.email='$email'";

if ($res=$mysqli->query($q))
{
	
	while ($row = $res->fetch_array())
	{
	echo '<tr style="background-color:#BAE8FF;">';
	echo '<td>'.$row['first_name'].'</td>';
	echo '<td>'.$row['last_name'].'</td>';
	//echo '<td>'.$row['member'].'</td>';
	//echo '<td>'.$row['itinerary_id'].'</td>';
	echo '<td>'.$row['flight_id'].'</td>';
	echo '<td>'.$row['depart_time'].'</td>';
	echo '<td>'.$row['passport'].'</td>';
    echo '<td>'.$row['per_person_price'].'</td>';
    if ($row['status'] == 1) {
        echo '<td>Paid</td>';
    }
    elseif ($row['status'] == 2) {
        echo '<td>Refunded by '.$row['remark'].'</td>';
    }
	elseif($row['status'] == 3) {
	echo '<td>Wait for refund</td>'; }
    else {
        echo '<td></td>';
    }
	
	$fidd = $row['flight_id'];
	$fidd1 = $row['itinerary_id'];
	$fidd2 = $row['depart_time'];
	

$getflightid = "select DISTINCT origin_airport , destination_airport from routes where flight_num in (select flight_id from passengers_on_flights where flight_id = '$fidd' order by flight_id) ";
$resultee=$mysqli->query($getflightid);
$frormrow=$resultee->fetch_array();
$fromhere = $frormrow['origin_airport'];
$tohere = $frormrow['destination_airport'];

$forget= $fromhere . $tohere . $fidd2 . $fidd1;

 if ($row['status'] == 1) {

	echo '<td>'.'<a href="WA_refunds.php?personid='.$forget.'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
 }
 else{
 echo '<td></td>'; }

	echo '</tr>';
	
	$row = $res->fetch_array();
    
    echo '<tr>';
	echo '<td>'.$row['first_name'].'</td>';
	echo '<td>'.$row['last_name'].'</td>';
	//echo '<td>'.$row['member'].'</td>';
	//echo '<td>'.$row['itinerary_id'].'</td>';
	echo '<td>'.$row['flight_id'].'</td>';
	echo '<td>'.$row['depart_time'].'</td>';
	echo '<td>'.$row['passport'].'</td>';
    echo '<td>'.$row['per_person_price'].'</td>';
    if ($row['status'] == 1) {
        echo '<td>Paid</td>';
    }
    elseif ($row['status'] == 2) {
        echo '<td>Refunded by '.$row['remark'].'</td>';
    }
	elseif($row['status'] == 3) {
	echo '<td>Wait for refund</td>'; }
    else {
        echo '<td></td>';
    }
	
	$fidd = $row['flight_id'];
	$fidd1 = $row['itinerary_id'];
	$fidd2 = $row['depart_time'];
	

$getflightid = "select DISTINCT origin_airport , destination_airport from routes where flight_num in (select flight_id from passengers_on_flights where flight_id = '$fidd' order by flight_id) ";
$resultee=$mysqli->query($getflightid);
$frormrow=$resultee->fetch_array();
$fromhere = $frormrow['origin_airport'];
$tohere = $frormrow['destination_airport'];

$forget= $fromhere . $tohere . $fidd2 . $fidd1;



 if ($row['status'] == 1) {

	echo '<td>'.'<a href="WA_refunds.php?personid='.$forget.'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
 }
 else{
 echo '<td></td>'; }	echo '</tr>';
	
	
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
</body>
</html>