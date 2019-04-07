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





$from = ' ';
$to= ' ';
$depart=' ';
$theget;
if(isset($_GET['idbooking'])){
	$theget = $_GET['idbooking'];
	

	if(strlen($theget) == '7')
	{
		//echo"hi";
		$from = substr($theget,-7,3);
		$to = substr($theget,-4,3);

		$passenger = substr($theget,-1);
		
		
	}
	if(strlen($theget) == '8')
	{
		$from = substr($theget,-8,3);
		$to = substr($theget,-5,3);

		$passenger = substr($theget,-2);
	}

	
} 
if(isset($_GET['idbookings'])){
	$thegets = $_GET['idbookings'];
	if(strlen($thegets) == '17')
	{
		//echo"hi";
		$from = substr($thegets,-17,3);
		$to = substr($thegets,-14,3);
		$depart = substr($thegets,-11,10);
		//$return = substr($thegets,-11,10);
		$passenger = substr($thegets,-1);
		
	}
	if(strlen($thegets) == '18')
	{
		$from = substr($thegets,-18,3);
		$to = substr($thegets,-15,3);
		$depart = substr($thegets,-12,10);
		//$return = substr($thegets,-12,10);
		$passenger = substr($thegets,-2);
	}

	
} 



else if(isset($_POST['from'])&&
  isset($_POST['to'])&&
   isset($_POST['depart'])&&
   isset($_POST['passenger']))
  {

	$fromp=$_POST['from'];
	$top=$_POST['to'];
	$depart=$_POST['depart'];
	//$return=$_POST['return'];
	$passenger=$_POST['passenger'];
	
	$_SESSION["from"]=$_POST['from'];
	$_SESSION["to"]=$_POST['to'];
	$_SESSION["depart"]=$_POST['depart'];
	//$_SESSION["return"]=$_POST['return'];
	$_SESSION["passenger"]=$_POST['passenger'];
	
	


$ffromcode = "select airport_code from countries, airports where airports.country_code = countries.country_code and countries.name = '$fromp'";

$resultee=$mysqli->query($ffromcode);
$fromrow=$resultee->fetch_array();
$from = $fromrow['airport_code'];


//;


$ftocode = "select airport_code from countries, airports where airports.country_code = countries.country_code and countries.name = '$top'";
$resulte=$mysqli->query($ftocode);
$torow=$resulte->fetch_array();
$to = $torow['airport_code'];	

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
<title>Booking | Select a flight</title>
</head>

<body>

<div class="modal fade" id="SigninModal" tabindex="-1" role="dialog" aria-labelledby="SigninModalLabel" aria-hidden="true" data-focus-on="input:first">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SigninModalLabel">Sign in</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="assets/php/WA_booking_signin.php?idbookings=<?php echo $from . $to . $depart. $passenger ?>" method="POST">
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" id="ForgotButton" data-dismiss="modal" data-toggle="modal" data-target="#ForgotModal">Forgot?</button>
                            <button type="button" class="btn btn-outline-primary" id="SignupButton" data-dismiss="modal" data-toggle="modal" data-target="#SignupModal">Sign up</button>
                            <button type="submit" class="btn btn-success btn-block" id="SigninButton" name="Signin">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>	
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
                            <h4>All Flights of Warp Airline </h4> 
                            <hr> 
                      </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12">
						
						
                            <div> 
                                                                
                                <table>
                <col width="15%">
                <col width="15%">
                <col width="20%">
                <col width="20%">
                <col width="15%">
                <col width="15%">
									
				<h5>From: <?php echo $from?>&nbsp;&nbsp; To: <?php echo $to?></h5>	
									
				
						
				<tr>
					<th>Original</th>
                    <th>Destination</th>
                    <th>Flight ID</th>
                    <th>Depart Time</th>
                    <th>Arrive Time</th>
                    <th>Base Price</th>
										<th></th>


					
                </tr>
				
				
            <?php $em=0;
			

		$qq="SELECT DISTINCT routes.origin_airport as originair, routes.destination_airport as desair, flights.flight_id as 
		fliid, flights.depart_time as dtime, date(depart_time) as departdateonly,date(arrive_time) as arrivedateonly,
		flights.arrive_time as atime, flights.base_price as bprice from flights, routes, airports, countries where flights.flight_id = routes.flight_num 
		and routes.origin_airport in (select airport_code from airports where airport_code = '$from') and routes.destination_airport in (select airport_code from airports where airport_code = '$to' )  and Date(flights.depart_time) = '$depart' ";

if ($resone=$mysqli->query($qq))
{

	while ($roww = $resone->fetch_array())
	{	
	

		if(isset($_SESSION["username"])){

			echo '<tr class="flight_select">';
		echo '<td>'.$roww['originair'].'</td>';
		echo '<td>'.$roww['desair'].'</td>';	
		echo '<td>'.$roww['fliid'].'</td>';
		echo '<td>'.$roww['dtime'].'</td>';
		echo '<td>'.$roww['atime'].'</td>';
		echo '<td>'.$roww['bprice'].'</td>';

		
echo '<td>'.'<a href="WA_booking_person_info.php?idbooking='.$from . $to . $roww['departdateonly'] . $passenger.'">'. '<img src="assets/images/icon/Add.png" width="24" height="24">' .'</a>'.'</td>';

		echo '</tr>';

		}
		
		else
		{
			//echo "ey";
		echo '<tr class="flight_select" data-toggle="modal" data-target="#SigninModal">';
		echo '<td>'.$roww['originair'].'</td>';
		echo '<td>'.$roww['desair'].'</td>';	
		echo '<td>'.$roww['fliid'].'</td>';
		echo '<td>'.$roww['dtime'].'</td>';
		echo '<td>'.$roww['atime'].'</td>';
		echo '<td>'.$roww['bprice'].'</td>';
echo '<td>'. '<img src="assets/images/icon/Add.png" width="24" height="24">' .'</a>'.'</td>';
		echo '</a>';
		
		echo '</tr>';
		}
	$em=1;
	}
	
//echo "hey";
	
}
if($em==0){
	
$q="SELECT DISTINCT routes.origin_airport as originair, routes.destination_airport as desair, flights.flight_id as 
		fliid, flights.depart_time as dtime, date(depart_time) as departdateonly,date(arrive_time) as arrivedateonly,
		flights.arrive_time as atime, flights.base_price as bprice from flights, routes, airports, countries where flights.flight_id = routes.flight_num 
		and routes.origin_airport in (select airport_code from airports where airport_code = '$from') and routes.destination_airport in (select airport_code from airports where airport_code = '$to' )   ";
if ($res=$mysqli->query($q))
{

	while ($row = $res->fetch_array())
	{

		if(isset($_SESSION["username"])){
		
			echo '<tr class="flight_select">';
		echo '<td>'.$row['originair'].'</td>';
		echo '<td>'.$row['desair'].'</td>';	
		echo '<td>'.$row['fliid'].'</td>';
		echo '<td>'.$row['dtime'].'</td>';
		echo '<td>'.$row['atime'].'</td>';
		echo '<td>'.$row['bprice'].'</td>';

echo '<td>'.'<a href="WA_booking_person_info.php?idbooking='.$from . $to . $row['departdateonly'] . $passenger.'">'. '<img src="assets/images/icon/Add.png" width="24" height="24">' .'</a>'.'</td>';

		echo '</tr>';

		}
		
		else
		{
		echo '<tr class="flight_select" data-toggle="modal" data-target="#SigninModal">';
		echo '<td>'.$row['originair'].'</td>';
		echo '<td>'.$row['desair'].'</td>';	
		echo '<td>'.$row['fliid'].'</td>';
		echo '<td>'.$row['dtime'].'</td>';
		echo '<td>'.$row['atime'].'</td>';
		echo '<td>'.$row['bprice'].'</td>';
echo '<td>'. '<img src="assets/images/icon/Add.png" width="24" height="24">' .'</a>'.'</td>';

		echo '</a>';
		
		echo '</tr>';
		}
	
	}
	

	
}

}							
?>
<?php if($em==0){ ?> 
	<h4 style="color: #FF0004;font-size: 20px;"  style="display: none;" >No date are available on your selection, here are some other fight</h4>
      <?php } else{?> 
									
		<h4 style="color: #0C1D9F;font-size: 20px;"  style="display: none;" >Here is your fight</h4>				
	<?php }?>
									
                                        
            </table>
			
                    <?php




?>					
                                                      
                                                                
                          </div>                             
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div> 
		
		<br>
<div class="row"> 
        <div class="col-md-2 "> 
            
				<a href="index.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">< Home</a> 
                
         
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
            
				<?php //<a href="WA_booking_person_info.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">Passenger information ></a> 
                ?>
         
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