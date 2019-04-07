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
    <img src="assets/images/logos/WarpAirline_navlogo.png">
   			<p align="right" style="color:#ffffff;">admin: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="assets/php/WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a>
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
              
                <a href="WA_BE_Routes.php" class="list-group-item list-group-item-active" style="background-color: #0a1b4f;">Routes</a> 
				<a href="WA_BE_Flights.php" class="list-group-item list-group-item-action">Flights</a> 
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
						
						
	
                            <h4>Condition for adding a new route</h4> 
                            <hr> 
                      </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12"> 
<?php
function rec_post($a)
{
	if (isset($_POST[$a]) && strlen($_POST[$a]) > 0)
		return $_POST[$a];
	
	return False;
}
//if(isset($_POST['submit_add_route'])){
echo "hi";
$rrr_routeid = rec_post('add_routeid',$mysqli);
$rrr_Original = rec_post('add_Original',$mysqli);
$rrr_dest = rec_post('add_destination',$mysqli);
$rrr_acid = rec_post('add_aircraftid',$mysqli);
$rrr_distance = rec_post('add_distancemiles',$mysqli);
echo "hi";
if ($rrr_dest != $rrr_Original){
	echo "hi";
	echo $rrr_routeid . $rrr_Original . $rrr_dest . $rrr_acid . $rrr_distance;
		if ($rrr_routeid != "" && $rrr_Original != "" && $rrr_dest != "" && $rrr_acid != "" && $rrr_distance != ""){
			
				$autoin = "(SELECT substring(route_id,1,1) as onee, substring(route_id,2,1) as two , 
				substring(route_id,1,1)*10 + substring(route_id,2,1) as sum from `routes`where length(substring(route_id,2,1))!=0
				ORDER BY `route_id` DESC limit 0,1) UNION (SELECT substring(route_id,1,1) as onee, substring(route_id,2,1) 
				as two , substring(route_id,1,1) + substring(route_id,2,1) as sum from `routes`where 
				length(substring(route_id,2,1))=0 ORDER BY `route_id` DESC limit 0,0)  ";
					require_once('WA_dbconnect.php');
					$resultss=$mysqli->query($autoin);
					$row=$resultss->fetch_array();	
					$numtest = $row['sum'];
					$test = (int)$numtest;
					$test++;


				$qqqt="INSERT INTO `routes`( `route_id`,`flight_num`, `origin_airport`, `destination_airport`, `aircraft_id`, `destance_miles`) 
				VALUES ('$test','$rrr_routeid','$rrr_Original','$rrr_dest','$rrr_acid','$rrr_distance')";
				require_once('WA_dbconnect.php');
					if (!$mysqli->query($qqqt))
					{
						
						echo "INSERT FAIL!!! --> " . $qqqt ;
					}	
					else{
						header("Location: WA_BE_Routes.php?m=Register_Success");

					}



} 
			else{
				echo "It didnt add :/";
			}
}


?>
					
						<form action="WA_BE_add_Routes.php" method="POST"> 
                                 <div class="form-group row"> 
								<ol>
									<li>The original airport and the destination airport cannot be the same place.</li>
									<li>All of the information must be filled.
									</li>
									<li>All of the filled information must be coherance.</li>
									
									</ol> <ul><center><table border="1">
									<tr>
									<th>Country Code</th>
									<th>Country Name</th>
									<th>Airport Code</th>
									<th>Airport Name</th>
									</tr>
									
<?php
$countriesq="SELECT c.country_code as aaaaa, c.name as bbbbb, a.airport_code as ccccc, a.airport_name as ddddd FROM `countries` c, airports a where c.country_code = a.country_code ";
require_once('WA_dbconnect.php');
if ($rescountriesq=$mysqli->query($countriesq))
{
	while ($rowcountriesq = $rescountriesq->fetch_array())
	{
	echo '<tr>';
	echo '<td>'.$rowcountriesq['aaaaa'].'</td>';
	echo '<td>'.$rowcountriesq['bbbbb'].'</td>'; 
	echo '<td>'.$rowcountriesq['ccccc'].'</td>'; 
	echo '<td>'.$rowcountriesq['ddddd'].'</td>'; 
	echo '</tr>';
	}
	
}
	?> </table></center>
	</ul>
	
									
									
                                </div> <hr><h4>Add a new route</h4><br>                   
                                <div class="form-group row"> 
                                    <label for="add_routeid" class="col-4 col-form-label">Route ID</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="add_routeid" placeholder="i.e. EDEF" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								
								<div class="form-group row"> 
                                    <label for="add_Original" class="col-4 col-form-label">Original Airport</label>                                     
                                    <div class="col-8"> 
                                        <select id="name" name="add_Original">
										<option value="">---Select the airport---</option>
										<?php
						$countrycodeqq='SELECT `airport_code`, `airport_name`, c.name as coun FROM `airports`a, countries c WHERE a.country_code = c.country_code';
						require_once('WA_dbconnect.php');
						if($resultcountrycodeqq=$mysqli->query($countrycodeqq)){
							while($rowcountrycodeqq=$resultcountrycodeqq->fetch_array()){
								echo '<option value="'.$rowcountrycodeqq['airport_code'].'">'.$rowcountrycodeqq['airport_name']. '</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
										</select>
								
                                    </div>                                     
                                </div> 
								
								<div class="form-group row"> 
                                    <label for="add_destination" class="col-4 col-form-label">Destination Airport</label>                                     
                                    <div class="col-8"> 
                                        <select id="name" name="add_destination">
										<option value="">---Select the airport---</option>
										<?php
						$countrycodeeqq='SELECT `airport_code`, `airport_name`, c.name as coun FROM `airports`a, countries c WHERE a.country_code = c.country_code';
						require_once('WA_dbconnect.php');
						if($resultcountrycodeeqq=$mysqli->query($countrycodeeqq)){
							while($rowcountrycodeeqq=$resultcountrycodeeqq->fetch_array()){
								echo '<option value="'.$rowcountrycodeeqq['airport_code'].'">'.$rowcountrycodeeqq['airport_name']. '</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
										</select>                                    </div>                                     
                                </div> 
								<div class="form-group row"> 
                                    <label for="add_aircraftid" class="col-4 col-form-label">Aircraft ID</label>                                     
                                    <div class="col-8"> 
                                        <select id="name" name="add_aircraftid">
										<option value="">---Select the aircraft---</option>
										<?php
						$aircraftcodeqq='SELECT `aircraft_id` FROM `aircrafts`';
						require_once('WA_dbconnect.php');
						if($resultaircraftcodeqq=$mysqli->query($aircraftcodeqq)){
							while($rowaircraftcodeqq=$resultaircraftcodeqq->fetch_array()){
								echo '<option value="'.$rowaircraftcodeqq['aircraft_id'].'">'.$rowaircraftcodeqq['aircraft_id']. '</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
										</select>                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="add_distancemiles" class="col-4 col-form-label">Distance Miles</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="add_distancemiles" placeholder="i.e. 2000" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <div class="offset-4 col-8"> 
                                        <button name="submit_add_route" type="submit" class="btn btn-primary" style="background-color: #0a1b4f;">Add a route</button>                                         
                                    </div>                                     
                                </div> 
						</form>
						
						
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