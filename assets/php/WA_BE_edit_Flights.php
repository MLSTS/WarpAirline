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
                            <h4>Edit a flight</h4> 
                            <hr> 
                      </div>                         
                    </div>    
<?php
$flightsid = $_GET['flightsid']; 
	//echo strlen($flightsid);
	//echo $flightsid;
	if(strlen($flightsid) == '24')
	{
		$datetime = substr($flightsid,-24,19);
		$fid = substr($flightsid,-4);
	}
	if(strlen($flightsid) == '23')
	{
		$datetime = substr($flightsid,-23,19);
		$fid = substr($flightsid,-3);
	}
	echo $fid;
	echo $datetime;

	//require_once('WA_dbconnect.php');

	if (isset($flightsid)) {

$qee="select * from flights where flight_id = '$fid' 
		and depart_time = '$datetime'";
$resultee=$mysqli->query($qee);
$row=$resultee->fetch_array();	

if(!$mysqli->query($qee)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }	
	}				
?>				
                    <div class="row"> 
                        <div class="col-md-12">
						

						
						
						
                            <form action="WA_BE_edit_helper_Flights.php?flightid=<?php echo $flightsid ?>" method="post"> 
                               
                                <div class="form-group row"> 
                                    <label for="whyprice" class="col-4 col-form-label">Base Price</label>                                     
                                    <div class="col-8"> 
                                        <input id="whyprice" name="whyprice" value="<?php echo $row['base_price']?>" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								
								<div class="form-group row"> 
                                    <label for="whystatus" class="col-4 col-form-label">Status</label>                                     
                                    <div class="col-8"> 
                                        <select id="whystatus" name="whystatus">
										<option value="">---Select flight status---</option>
										<?php
						$statusqq='SELECT fs.name as fsssss , fs.status_id as sfsf FROM flight_statuses fs';
						require_once('WA_dbconnect.php');
						if($resultstatusqq=$mysqli->query($statusqq)){
							while($rowstatusqq=$resultstatusqq->fetch_array()){
								echo '<option name="'.$rowstatusqq['sfsf'].'">'.$rowstatusqq['fsssss']. '</option>';
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
                                        <button name="submit" type="submit" class="btn btn-primary" style="background-color: #0a1b4f;">

										Update My Profile</button>  







										
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