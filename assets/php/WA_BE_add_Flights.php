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

$fff_flightid = rec_post('addf_flightid',$mysqli);
$fff_date = rec_post('addf_date',$mysqli);
$fff_dtime = rec_post('addf_departtime',$mysqli);
$fff_atime= rec_post('addf_arrivetime',$mysqli);
$fff_price = rec_post('addf_price',$mysqli);
$fff_status = rec_post('addf_status',$mysqli);

//if ($fff_dtime != $fff_atime){

		if ($fff_flightid != "" && $fff_date != "" && $fff_dtime != "" && $fff_atime != "" && $fff_price != "" && $fff_status != ""){
					
					$aboutrouteid = "SELECT f.flight_id , f.route_id as thisone FROM flights f, routes r WHERE r.flight_num = f.flight_id 
				and f.route_id = r.route_id order by f.flight_id";
				require_once('WA_dbconnect.php');
					$resultid=$mysqli->query($aboutrouteid);
					$rowd=$resultid->fetch_array();	
					$numtestt = $rowd['thisone'];
					$routena = (int)$numtestt;
					
				
				$fff_departdt = $fff_date .'&nbsp;'. $fff_dtime;
				$fff_arrivedt = $fff_date .'&nbsp;'. $fff_atime;
				$qqqf="INSERT INTO `flights`(`flight_id`, `route_id`, `depart_time`, `arrive_time`, `base_price`, `status_id`) 
				VALUES ('$fff_flightid','$routena','$fff_departdt','$fff_arrivedt','$fff_price','$fff_status')";
				require_once('WA_dbconnect.php');
					if (!$mysqli->query($qqqf))
					{
						
						echo "INSERT FAIL!!! --> " . $qqqf;
					}	
					else{
						header("Location: WA_BE_Flights.php?m=Register_Success");
						
					}



}
//}


?>
					
						<form action="WA_BE_add_Flights.php" method="POST"> 
                                 <div class="form-group row"> 
								<ol>
									<li>Depart time and arrive time cannot be the same.</li>
									<li>All of the information must be filled.
									</li>
									<li>All of the filled information must be coherance.</li>
									
									</ol> 
	
									
									
                                </div> <hr><h4>Add a new flight</h4><br>                   
                                <div class="form-group row"> 
                                    <label for="add_routeid" class="col-4 col-form-label">Route ID</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="addf_flightid" placeholder="i.e. EDEF" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="add_routeid" class="col-4 col-form-label">Date</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="addf_date" placeholder="YYYY-MM-DD i.e. 2019-01-20" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="add_routeid" class="col-4 col-form-label">Depart Time</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="addf_departtime" placeholder="HH:MM:SS i.e. 09:00:00" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="add_routeid" class="col-4 col-form-label">Arrive Time</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="addf_arrivetime" placeholder="HH:MM:SS i.e. 09:30:00" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="add_routeid" class="col-4 col-form-label">Base Price</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="addf_price" placeholder="i.e. 1800" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								
								<div class="form-group row"> 
                                    <label for="add_Original" class="col-4 col-form-label">Status</label>                                     
                                    <div class="col-8"> 
                                        <select id="name" name="addf_status">
										<option value="">---Select flight status---</option>
										<?php
						$statusqq='SELECT fs.name as fsssss , fs.status_id as sfsf FROM flight_statuses fs';
						require_once('WA_dbconnect.php');
						if($resultstatusqq=$mysqli->query($statusqq)){
							while($rowstatusqq=$resultstatusqq->fetch_array()){
								echo '<option value="'.$rowstatusqq['sfsf'].'">'.$rowstatusqq['fsssss']. '</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
										</select>
								
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