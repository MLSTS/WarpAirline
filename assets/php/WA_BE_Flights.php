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
				<a href="WA_BE_Flights.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">Flights</a> 
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
                            <h4>All Flights of Warp Airline</h4> 
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
$q="SELECT `flight_id`, depart_time, status, remark, SUBSTRING(depart_time, 1, 10) as departdate, SUBSTRING(depart_time, 11, 9) as departtime 
,SUBSTRING(arrive_time, 11, 9) as arrivetime,`base_price`,fs.name as statusname FROM flights f , flight_statuses fs 
where f.status_id=fs.status_id order by departdate, departtime";
if ($res=$mysqli->query($q))
{
	while ($row = $res->fetch_array())
	{
	echo '<tr style="background-color:#BAE8FF;">';
	echo '<td>'.$row['flight_id'].'</td>';
	echo '<td>'.$row['departdate'].'</td>';
	echo '<td>'.$row['departtime'].'</td>';
	echo '<td>'.$row['arrivetime'].'</td>';
	echo '<td>'.$row['base_price'].'</td>';
    if ($row['status'] == 1) {
        echo '<td>Normal - '.$row['statusname'].'</td>';
    }
    elseif ($row['status'] == 2) {
        echo '<td>Suspended by '.$row['remark'].'</td>';
    }
    else {
        echo '<td></td>';
    }
	echo '<td>'.'<a href="WA_BE_edit_Flights.php?flightsid='.$row['depart_time'].'+'.$row['flight_id'].'">'. '<img src="../images/icon/Modify.png" width="24" height="24">' .'</a>'.'</td>';

if ($row['status'] == 1) {
	echo '<td>'.'<a href="WA_BE_del_Flights.php?flightsid='.$row['depart_time'].'+'.$row['flight_id'].'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
}
	else{
	echo '<td>'.'<a href="WA_BE_del_Flight.php?flightsid='.$row['depart_time'].'+'.$row['flight_id'].'">'. '<img src="../images/icon/Add.png" width="24" height="24">' .'</a>'.'</td>';

}

	echo '</tr>';
		
	$row = $res->fetch_array();	
	echo '<tr>';
	echo '<td>'.$row['flight_id'].'</td>';
	echo '<td>'.$row['departdate'].'</td>';
	echo '<td>'.$row['departtime'].'</td>';
	echo '<td>'.$row['arrivetime'].'</td>';
	echo '<td>'.$row['base_price'].'</td>';
    if ($row['status'] == 1) {
        echo '<td>Normal - '.$row['statusname'].'</td>';
    }
    elseif ($row['status'] == 2) {
        echo '<td>Suspended by '.$row['remark'].'</td>';
    }
    else {
        echo '<td></td>';
    }
	echo '<td>'.'<a href="WA_BE_edit_Flights.php?flightsid='.$row['depart_time'].'+'.$row['flight_id'].'">'. '<img src="../images/icon/Modify.png" width="24" height="24">' .'</a>'.'</td>';
if ($row['status'] == 1) {
	echo '<td>'.'<a href="WA_BE_del_Flights.php?flightsid='.$row['depart_time'].'+'.$row['flight_id'].'">'. '<img src="../images/icon/Delete.png" width="24" height="24">' .'</a>'.'</td>';
}
	else{
	echo '<td>'.'<a href="WA_BE_del_Flight.php?flightsid='.$row['depart_time'].'+'.$row['flight_id'].'">'. '<img src="../images/icon/Add.png" width="24" height="24">' .'</a>'.'</td>';

}	echo '</tr>';	
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