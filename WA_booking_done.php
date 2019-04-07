<!doctype html>

<?php
error_reporting(E_ERROR | E_PARSE);
include_once 'assets/php/WA_dbconnect.php';

// Start the session

session_start();



$username =  $_SESSION["username"];


$formember="select member from person where username = '$username' and member = 'E'";
$resultformember=$mysqli->query($formember);
$fromformember=$resultformember->fetch_array();
$member = $fromformember['member'];




if(isset($_SESSION["username"])){
$username =  $_SESSION["username"];
}


	$theget = $_GET['idbooking'];
	if(strlen($theget) == '17')
	{
		//echo"hi";
		$from = substr($theget,-17,3);
		$to = substr($theget,-14,3);
		$depart = substr($theget,-11,10);
		//$return = substr($theget,-11,10);
		$passenger = substr($theget,-1);
		
	}
	if(strlen($theget) == '18')
	{
		$from = substr($theget,-18,3);
		$to = substr($theget,-15,3);
		$depart = substr($theget,-12,10);
		//$return = substr($theget,-12,10);
		$passenger = substr($theget,-2);
	}


	
?>



<style>
	.flight_select{
		
		cursor: pointer;
	}
	.flight_select a{
		color: #000000;
	}
	.flight_select:hover{
		background-color: #D1FFD2;
	}
</style>	
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/php/assets/css/style.css">
<!------ Include the above in your HEAD tag ----------> 
<html>
<head>
<title>Booking | Confirmed</title>
</head>

<body>
	
<h9 style="color: #ffffff; font-size: 20px; background-color: #0a1b4f;        line-height: 42px;display:grid;grid-template-columns:1fr 1fr 0.2fr;grid-template-rows:48px;grid-template-areas:'Home Home Home Home Home About us Flight Deals Deals';grid-auto-columns:0px;grid-auto-rows:0px;grid-gap:0px;">
    <img src="assets/images/logos/WarpAirline_navlogo.png">
   <?php
			
if($username){
				if($username == "MatitL" || $username == "PintusornS" ||$username == "WasuponP" ||$username == "NatthanichaS"||$username == "TrongtrongV" || $member == "E"){?>
					<p align="right" style="color:#ffffff;">admin: <?php echo $username;?>&nbsp; &nbsp; 
					
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
<?php } 
else{ ?> 
					<p align="right" style="color:#ffffff;">username: <?php echo $username;?>&nbsp; &nbsp; 
					
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
				<?php }
 } ?>


    <p><small><br></small></p>
</h9>
<br>
<div class="container"> 
    
		
        <div class="10"> 
            <div class="card"> 
                <div class="card-body"> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <h4>You are successfully book flights</h4> 
                            <hr> 
                      </div>                         
                    </div>  
					<div class="row"> 
					<div class="col-md-12">
					
					</div>
					</div>
                    <div class="row"> 
						<div class="col-md-8">
						</div>
                        <div class="col-md-10">
						
						
                            <div> 

										
<?php
	
for($a= 1 ;$a < $passenger+1; $a++){
${"pm_firstname".$a} = $_POST['psg_firstname'.$a.''];
${"pm_lastname".$a} = $_POST['psg_lastname'.$a.''];
${"pm_passport".$a} = $_POST['psg_passport'.$a.''];
${"pm_dob".$a} = $_POST['psg_dateofbirth'.$a.''];
${"pm_email".$a} = $_POST['psg_email'.$a.''];
${"pm_phone".$a} = $_POST['psg_phone'.$a.''];

					$getmaxpersonid = "select max(CAST(person_id as signed)) as max_id from person  ";
					$result1=$mysqli->query($getmaxpersonid);
					$row1=$result1->fetch_array();	
					$maxid = $row1['max_id'];
					$personid = (int)$maxid;
					$personid++;
					
					$checkusername= "SELECT * FROM `person` WHERE first_name='${"pm_firstname".$a}' and last_name='${"pm_lastname".$a}' ";
					$result2=$mysqli->query($checkusername);
					$row2=$result2->fetch_array();
					
					if($row2['first_name'] != ${"pm_firstname".$a} && $row2['last_name'] != ${"pm_lastname".$a} ){
						$insertperson="INSERT INTO `person`(`person_id`, `member`, `first_name`, `last_name`, `dateofbirth`, `gender`, `email`, `phone`, `passport`,status) VALUES 
						('".$personid."','N','".${"pm_firstname".$a}."','".${"pm_lastname".$a}."','".${"pm_dob".$a}."','N',
						'".${"pm_email".$a}."','".${"pm_phone".$a}."','".${"pm_passport".$a}."','1')";
						$mysqli->query($insertperson);	
						echo "<br>Passenger ".$a." is not yet registered";
						//echo "<br>Insert passenger ".$a."'s info into PERSON table with person_id=".$personid.".";
					}
					else{
						echo "<br>Passenger ".$a." is already registered";
						//echo "<br>Insert passenger ".$a."'s info into PERSON table with person_id=".$personid.".";
					}

					
					
					$getmaxitiid = "select max(CAST(itinerary_id as signed)) as max_itiid from passengers_on_flights";
					$result3=$mysqli->query($getmaxitiid);
					$row3=$result3->fetch_array();	
					$maxiti = $row3['max_itiid'];
					$itinerid = (int)$maxiti;
					$itinerid++;
					
					$getflightid ="select distinct flight_id from flights where flight_id in (select flight_num from routes 
					where origin_airport= '$from' and destination_airport = '$to')";
					$result4 = $mysqli -> query($getflightid);
					$row4 = $result4 -> fetch_array();
					$flightid = $row4['flight_id'];
					
					$getrouteid = "SELECT route_id from routes where flight_num = '$flightid' ";
					$result5=$mysqli->query($getrouteid);
					$row5=$result5->fetch_array();	
					$routeid = $row5['route_id'];

					$gettime ="select time(depart_time) as dtime from flights where date(depart_time) = '$depart' and flight_id = '$flightid'";
					$result6 = $mysqli -> query($gettime);
					$row6 = $result6 -> fetch_array();
					$timedepart = $row6['dtime'];
	
					$departdatetime = $depart.' '.$timedepart;
					
					$getbaseprice = "select base_price from flights where flight_id in (Select flight_num from routes where 
							origin_airport = '$from' and destination_airport = '$to') and date(depart_time) = '$depart'  ";
							$result7 = $mysqli->query($getbaseprice);
							$row7 = $result7->fetch_array();
							$baseprice = $row7['base_price'];
                    
                    $seat = "SELECT seat_num FROM passengers_on_flights ORDER BY seat_num DESC LIMIT 1 ";
                    $seat_num1 = $mysqli->query($seat);
                    $seat_num2 = $seat_num1->fetch_array();
                    $seat_num3 = $seat_num2['seat_num'];
                    $seat_num4 = preg_replace('/[^0-9]/', '', $seat_num3);
                    $seat_num5 = $seat_num4 + 1;
                    $seat_num = "A" . $seat_num5;
    
					$inflight ="INSERT INTO `passengers_on_flights`(`itinerary_id`,  `flight_id`,`route_id`, `depart_time`, `seat_num`, `email`,
					 `per_person_price`, `passport`,status) VALUES ('".$itinerid."','".$flightid."','".$routeid."','".$departdatetime."','".$seat_num."','".${"pm_email".$a}."',
					'".$baseprice."','".${"pm_passport".$a}."','1')";
					$mysqli->query($inflight);
					if ($mysqli->query($inflight))
					{
						
						//echo "<br>Passenger ".a. "success add into Passengers_on_flights table with itinerary id of".$itinerid.".";
					}
					else{
						//echo "<br>Fail to insert into Passengers_on_flights table.<br>";
						//echo $inflight;
						//echo "<br>Error: ".$mysqli->error ;
						
					}
                    $addseat = "INSERT INTO `aircraft_seats` (`aircraft_id`, `seat_num`, `class_id`) VALUES ('X0000001', '".$seat_num."', '1')";
                    $mysqli->query($addseat);

					
} ?>
                                                          
     			<center>	<a href="index.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">Home</a> 
                        </center>                                      
<br>

</div>	                       
                          </div>                             
                        </div>                         
                    </div> 
				

					
	</div>
<div class="row"> 
      
            <div class="col-md-2 "> 
                
         
            </div>  
			<div class="col-md-2 "> 
            </div>  
			<div class="col-md-2 "> 
            </div>  
			<div class="col-md-2 "> 
            </div>  
			<div class="col-md-2 "> 
            </div>  
			<div class="col-md-2 "> 
          
         
            </div>  
			
			
        </div>          
    </div>     
</div>

	 <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script type="text/javascript">
        var scroll = new SmoothScroll('a[data-scroll]');
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>