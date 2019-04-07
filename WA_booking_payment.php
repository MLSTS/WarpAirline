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
<title>Booking | Check out</title>
</head>

<body>
	
<h9 style="color: #ffffff; font-size: 20px; background-color: #0a1b4f;        line-height: 42px;display:grid;grid-template-columns:1fr 1fr 0.2fr;grid-template-rows:48px;grid-template-areas:'Home Home Home Home Home About us Flight Deals Deals';grid-auto-columns:0px;grid-auto-rows:0px;grid-gap:0px;">
    <img src="assets/images/logos/WarpAirline_navlogo.png">
   <?php
			
if($username){
				if($username == "MatitL" || $username == "PintusornS" ||$username == "WasuponP" ||$username == "NatthanichaS"||$username == "TrongtrongV" || $member == "E"){?>
					<p align="right" style="color:#ffffff;">admin: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="index.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Cancel booking</button></a>
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
<?php } 
else{ ?> 
					<p align="right" style="color:#ffffff;">username: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="index.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Cancel booking</button></a>
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
                            <h4>Check out process</h4> 
                            <hr> 
                      </div>                         
                    </div>  
					<div class="row"> 
					<div class="col-md-12">
					
					<?php
					$countrynamefrom ="select name from countries where country_code in (select country_code from airports where airport_code = '$from')";
					$rescountrynamefrom = $mysqli -> query($countrynamefrom);
					$rowcountrynamefrom = $rescountrynamefrom -> fetch_array();
					$countryfromm = $rowcountrynamefrom['name'];
					?>
					<?php
					$countrynameto ="select name from countries where country_code in (select country_code from airports where airport_code = '$to')";
					$rescountrynameto = $mysqli -> query($countrynameto);
					$rowcountrynameto = $rescountrynameto -> fetch_array();
					$countryto = $rowcountrynameto['name'];
					?>					
					<center><h5> Booking flights from <b><?php echo $countryfromm?></b>&nbsp to <b><?php echo $countryto?></b>&nbsp;<br>
					Total passengers: <b><?php echo $passenger ?></b></h5></center>
					<br>
					<center><table>	
								<col width="30%">
								<col width="30%">	
								<col width="30%">
								  
					<?php
					$flightidnumnum ="select distinct flight_id from flights where flight_id in (select flight_num from routes 
					where origin_airport= '$from' and destination_airport = '$to')";
					$resflightidnumnum = $mysqli -> query($flightidnumnum);
					$rowflightidnumnum = $resflightidnumnum -> fetch_array();
					$flightnoo = $rowflightidnumnum['flight_id'];
					?>			<tr>
									<th>Flight ID</th>
									<td><?php echo  $flightnoo ?></td>
								  </tr>
								  <tr>
								  <?php
					$aaa ="select airport_name from airports where airport_code = '$from' ";
					$raaa = $mysqli -> query($aaa);
					$waaa = $raaa -> fetch_array();
					$eaaa = $waaa['airport_name'];
					?>
									<th>Origin Airport</th>
									<td><?php echo  $eaaa ?></td>
								  </tr>
								  <tr>
								  <?php
					$bbb ="select airport_name from airports where airport_code = '$to' ";
					$rbbb = $mysqli -> query($bbb);
					$wbbb = $rbbb -> fetch_array();
					$ebbb = $wbbb['airport_name'];
					?>
									<th>Destination Airport</th>
									<td><?php echo  $ebbb ?></td>
								  </tr>
								  <tr>
									<th>Depart Date</th>
									<td><?php echo  $depart ?></td>
								  </tr>
								  <tr>
								  <?php
					$ccc ="select time(depart_time) as haha from flights where date(depart_time) = '$depart' and flight_id = '$flightnoo'";
					$rccc = $mysqli -> query($ccc);
					$wccc = $rccc -> fetch_array();
					$eccc = $wccc['haha'];
					?>
									<th>Depart Time</th>
									<td><?php echo  $eccc ?></td>
								  </tr>
								  <tr>
								  <?php
					$ddd ="select time(arrive_time) as hsha from flights where date(arrive_time) = '$depart' and flight_id = '$flightnoo'";
					$rddd = $mysqli -> query($ddd);
					$wddd = $rddd -> fetch_array();
					$eddd = $wddd['hsha'];
					?>
									<th>Arrive Time</th>
									<td><?php echo  $eddd ?></td>
								  </tr>
								  
								</table></center><br><hr></div>
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


}

?>                                                           
                                                                    <?php      for($a= 1 ;$a < $passenger+1; $a++){          ?>    
								
                                <div> 
								<center><table>	
								<col width="30%">
								<col width="30%">	
								<col width="30%">
								  <tr>
								  <td><center><h5>Passenger<?php echo $a?></h5></center></td>
									<th>First Name</th>
									<td><?php echo  ${"pm_firstname".$a} ?></td>
								  </tr>
								  <tr>
								  <td rowspan="6"></td>
									<th>Last Name</th>
									<td><?php echo  ${"pm_lastname".$a} ?></td>
								  </tr>
								  <tr>
									<th>Passport ID</th>
									<td><?php echo  ${"pm_passport".$a} ?></td>
								  </tr>
								  <tr>
									<th>Date of birth</th>
									<td><?php echo  ${"pm_dob".$a} ?></td>
								  </tr>
								  <tr>
									<th>Email</th>
									<td><?php echo  ${"pm_email".$a} ?></td>
								  </tr>
								  <tr>
									<th>Phone</th>
									<td><?php echo  ${"pm_phone".$a} ?></td>
								  </tr>
								</table>
								<hr></center>
                               
								
                                                              
                                  
								   							
                           <?php } ?>                     
                                         <div>
<br>
<center><h5>Your total cost is <?php 
							$basep = "select base_price as pls from flights where flight_id in (Select flight_num from routes where 
							origin_airport = '$from' and destination_airport = '$to') and date(depart_time) = '$depart'  ";
							$result = $mysqli->query($basep);
							$rorw = $result->fetch_array();
							
							$pricegee = $rorw['pls'];
							$plsp = (int)$pricegee;
							
							$sum = $plsp*$passenger;

							echo $plsp.' x '.$passenger.' = '.$sum;
							
							
	?></h5></center>
</div>	                       
                          </div>                             
                        </div>                         
                    </div> 
				

					
	</div>
<div class="row"> 
        <div class="col-md-3 "> 
            
			
            <form action="WA_booking_confirm_info.php?idbooking=<?php echo $from . $to . $depart. $passenger ?>" method="post">

		<?php

for($a= 1 ;$a < $passenger+1; $a++){

?>
	<input type = "hidden" name="psgb_firstname<?php echo $a?>" value="<?php echo ${"pm_firstname".$a}  ?>">
	<input type = "hidden" name="psgb_lastname<?php echo $a?>" value="<?php echo ${"pm_lastname".$a}  ?>" >
	<input type = "hidden" name="psgb_passport<?php echo $a?>" value="<?php echo ${"pm_passport".$a}  ?>">
	<input type = "hidden" name="psgb_dateofbirth<?php echo $a?>" value="<?php echo ${"pm_dob".$a}  ?>">
	<input type = "hidden" name="psgb_email<?php echo $a?>" value="<?php echo ${"pm_email".$a}  ?>">
	<input type = "hidden" name="psgb_phone<?php echo $a?>" value="<?php echo ${"pm_phone".$a}  ?>">
	
<?php } ?>
<input class="list-group-item list-group-item-action active" type="submit" value="< Confirm Information" style="background-color: #0a1b4f; width: 200px;">
</form>			
			
			
                
         
            </div>  
			<div class="col-md-3 "> 
            </div>  
			<div class="col-md-3 "> 
            </div>  
			
			 
			<div class="col-md-3 "> 
            <form action="WA_booking_done.php?idbooking=<?php echo $from . $to . $depart. $passenger ?>" method="post">

		<?php

for($a= 1 ;$a < $passenger+1; $a++){

?>
	<input type = "hidden" name="psg_firstname<?php echo $a?>" value="<?php echo ${"pm_firstname".$a}  ?>">
	<input type = "hidden" name="psg_lastname<?php echo $a?>" value="<?php echo ${"pm_lastname".$a}  ?>" >
	<input type = "hidden" name="psg_passport<?php echo $a?>" value="<?php echo ${"pm_passport".$a}  ?>">
	<input type = "hidden" name="psg_dateofbirth<?php echo $a?>" value="<?php echo ${"pm_dob".$a}  ?>">
	<input type = "hidden" name="psg_email<?php echo $a?>" value="<?php echo ${"pm_email".$a}  ?>">
	<input type = "hidden" name="psg_phone<?php echo $a?>" value="<?php echo ${"pm_phone".$a}  ?>">
	
<?php } ?>
<input class="list-group-item list-group-item-action active" type="submit" value="Confirm Payment" style="background-color: #0a1b4f; width: 200px;">
</form>
                
         
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