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
              
                <a href="WA_BE_Routes.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">Routes</a> 
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
                            <h4>Edit a route</h4> 
                            <hr> 
                      </div>                         
                    </div>    
<?php
$routeeid = $_GET['routesid']; 

	if (isset($routeeid)) {

$qee="select * from routes where route_id = '$routeeid'";
$resultee=$mysqli->query($qee);
$row=$resultee->fetch_array();	

if(!$mysqli->query($qee)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }	
	}				
?>				
                    <div class="row"> 
                        <div class="col-md-12">
						

						
						
						
                            <form action="WA_BE_edit_helper_Routes.php?arouteid=<?php echo $routeeid ?>" method="post"> 
                                <div class="form-group row"> 
                                    <label for="aircid" class="col-4 col-form-label">Aircraft ID</label>                                     
                                    <div class="col-8"> 
                                        <select id="aircid" name="aircid">
										<option value="">---Select an aircraft---</option>
										<?php
						$acidnaja='SELECT aircraft_id FROM aircrafts';
						require_once('WA_dbconnect.php');
						if($resultacidnaja=$mysqli->query($acidnaja)){
							while($rowacidnaja=$resultacidnaja->fetch_array()){
								echo '<option name="'.$rowacidnaja['aircraft_id'].'">'.$rowacidnaja['aircraft_id']. '</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
										</select>
								
                                    </div>                                     
                                </div> 
                                <div class="form-group row"> 
                                    <label for="distancem" class="col-4 col-form-label">Distance Miles</label>                                     
                                    <div class="col-8"> 
                                        <input id="distancem" name="distancem" value="<?php echo $row['destance_miles']?>" class="form-control here" type="text"> 
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