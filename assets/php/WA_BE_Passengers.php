<?php
include_once 'WA_dbconnect.php';

// Start the session

session_start();
$username =  $_SESSION["username"];
$member = $_SESSION['s_member'];

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
<h9 style="color: #ffffff; font-size: 20px; background-color: #0a1b4f;        line-height: 42px;display:grid;grid-template-columns:1fr 1fr 0.2fr;grid-template-rows:48px;grid-template-areas:'Home Home Home Home Home About us Flight Deals Deals';grid-auto-columns:0px;grid-auto-rows:0px;grid-gap:0px;">
    <img src="../images/logos/WarpAirline_navlogo.png">
   			<p align="right" style="color:#ffffff;">admin: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a>
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>



    <p><small><br></small></p>
</h9>
<?php
			//session_start(); // need it every time
			if(isset($_SESSION['s_user_name']) == 0)
			{	$homepage = "../../index.php";
				echo "<ul>You have to sign in to see this area.";
				echo "<br><a href ='".$homepage."'>Go to home page</a></ul>";
			}
			//else{
				if ($username == "MatitL" || $username == "PintusornS" || $username == "WasuponP" || $username == "NatthanichaS"|| $username == "TrongtrongV" || $member == "E")
				{
				
			
					

			?>
<div class="container"> 
    <div class="row"> 
        <div class="col-md-3 "> 
            <div class="list-group "> 
                <a href="WA_backend.php" class="list-group-item list-group-item-action action">Welcome</a> 
              
                <a href="WA_BE_Routes.php" class="list-group-item list-group-item-action">Routes</a> 
				<a href="WA_BE_Flights.php" class="list-group-item list-group-item-action">Flights</a> 
				<a href="WA_BE_Passengers.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">Passengers</a> 
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
                            <h4>Passengers of Warp Airline</h4> 
                            <hr> 
                      </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12"> 
						
                            <div> 
                                                                
                          <table>
                <col width="15%">
                <col width="10%">
                <col width="5%">
                <col width="10%">
				<col width="10%">
                <col width="20%">
                <col width="10%">
				<col width="8%">

                <tr>
                    <th>First name</th> 
                    <th>Last name</th>
                    <th>Member</th>
                    <th>Itinerary</th>
                    <th>Flight ID</th>
                    <th>Depart time</th>
					<th>Passport</th>
                    <th>Price</th>
                    <th>Status</th>
					<th>Refund</th>
                </tr>
				
				
                 <?php
$q="SELECT pof.*, p.first_name, p.last_name, p.member, p.email from passengers_on_flights pof, person p where pof.email=p.email";

if ($res=$mysqli->query($q))
{
	
	while ($row = $res->fetch_array())
	{
	echo '<tr style="background-color:#BAE8FF;">';
	echo '<td>'.$row['first_name'].'</td>';
	echo '<td>'.$row['last_name'].'</td>';
	echo '<td>'.$row['member'].'</td>';
	echo '<td>'.$row['itinerary_id'].'</td>';
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
	elseif ($row['status'] == 3) {
	echo '<td>cancel</td>'; }
    else {
        echo '<td>huh</td>';
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

	echo '<td>'.'<a href="WA_del_Passengers.php?personid='.$forget.'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
 }
 elseif ($row['status'] == 2) {
 echo '<td></td>'; }
	 
elseif ($row['status'] == 3) {
		echo '<td>'.'<a href="WA_BE_del_Passengers.php?personid='.$forget.'">'. '<img src="../images/icon/refund.png" width="24" height="24">' .'</a>'.'</td>';
}	echo '</tr>';
	
	$row = $res->fetch_array();
    
    echo '<tr>';
	echo '<td>'.$row['first_name'].'</td>';
	echo '<td>'.$row['last_name'].'</td>';
	echo '<td>'.$row['member'].'</td>';
	echo '<td>'.$row['itinerary_id'].'</td>';
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
	echo '<td>cancel</td>'; }
    else {
        echo '<td>hah</td>';
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

	echo '<td>'.'<a href="WA_del_Passengers.php?personid='.$forget.'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
 }
 elseif ($row['status'] == 2) {
 echo '<td></td>'; }
	 
elseif ($row['status'] == 3) {
		echo '<td>'.'<a href="WA_BE_del_Passengers.php?personid='.$forget.'">'. '<img src="../images/icon/refund.png" width="24" height="24">' .'</a>'.'</td>';
}
	
	
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
<?php 
				}
			else{
					$homepage = "../../index.php";
					echo "<ul>You don't have a permission to access this page. You are not an admin.";
					echo "<br><a href ='".$homepage."'>Go to home page</a></ul>";
					echo $username;
				}
			//}
			
			
			
			?>
</body>
</html>