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
		//$return = substr($theget,-1,10);
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

if(isset($_POST['psgb_firstname1'])&&
  isset($_POST['psgb_lastname1'])&&
   isset($_POST['psgb_passport1'])&&
   isset($_POST['psgb_dateofbirth1'])&&
   isset($_POST['psgb_email1'])&&
   isset($_POST['psgb_phone1']))
  {
for($a= 1 ;$a < $passenger+1; $a++){

${"psg_firstname".$a} = $_POST['psgb_firstname'.$a.''];
${"psg_lastname".$a} = $_POST['psgb_lastname'.$a.''];
${"psg_passport".$a} = $_POST['psgb_passport'.$a.''];
${"psg_dateofbirth".$a} = $_POST['psgb_dateofbirth'.$a.''];
${"psg_email".$a} = $_POST['psgb_email'.$a.''];
${"psg_phone".$a} = $_POST['psgb_phone'.$a.''];
}
}

else if(isset($_POST['bk_firstname1'])&&
  isset($_POST['bk_lastname1'])&&
   isset($_POST['bk_passport1'])&&
   isset($_POST['bk_dateofbirth1'])&&
   isset($_POST['bk_email1'])&&
   isset($_POST['bk_phone1']))
  {
for($a= 1 ;$a < $passenger+1; $a++){

${"psg_firstname".$a} = $_POST['bk_firstname'.$a.''];
${"psg_lastname".$a} = $_POST['bk_lastname'.$a.''];
${"psg_passport".$a} = $_POST['bk_passport'.$a.''];
${"psg_dateofbirth".$a} = $_POST['bk_dateofbirth'.$a.''];
${"psg_email".$a} = $_POST['bk_email'.$a.''];
${"psg_phone".$a} = $_POST['bk_phone'.$a.''];
}
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
<title>Booking | Confirm Passenger Info</title>
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
                            <h4>Confirm Booking</h4> 
                            <hr> 
                      </div>                         
                    </div>  
					
                    <div class="row"> 
                        <div class="col-md-12">
						
						
                            <div> 


				<h5>From: <?php echo $from?>&nbsp;&nbsp; To: <?php echo $to?>&nbsp;&nbsp;&nbsp;<?php echo $passenger ?> passenger(s)</h5>

                                                           
                                                      
                                                                
                          </div>                             
                        </div>                         
                    </div>      
<div class="row"> 
                        <div class="col-md-12"> 
						
                            <div> 
                                   
                          <table>
                <col width="5%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="30%">
				<col width="15%">

                <tr>
                    <th>No.</th> 
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Passport ID</th>
                    <th>Date of birth</th>
                    <th>Email</th>
					<th>Phone</th>
                </tr>

				
			<?php	for($a= 1 ;$a < $passenger+1; $a++){
				echo '<tr>';
						echo '<td>'.$a.'</td>';
						echo '<td>'.${"psg_firstname".$a}.'</td>';
						echo '<td>'.${"psg_lastname".$a}.'</td>';
						echo '<td>'.${"psg_passport".$a}.'</td>';
						echo '<td>'.${"psg_dateofbirth".$a}.'</td>';
						echo '<td>'.${"psg_email".$a}.'</td>';
						echo '<td>'.${"psg_phone".$a}.'</td>';
		echo '</tr>';	}
					?>
                 
                                            
            </table>          

      
					
							 				
                            </div>                             
                        </div>                         
                    </div>  

		
		<br>
<div class="row"> 
        <div class="col-md-3 "> 
  
								
								
								
   
				<a href="WA_booking_person_info.php?idbooking=<?php echo $from . $to . $depart. $passenger ?>" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">< Passengers Information</a> 
                
         
            </div>  
			 
			<div class="col-md-3 "> 
            </div>  
			 
			<div class="col-md-3"> 
			         <?php 
						$checkbutton = 0;		

		
		for($a= 1 ;$a < $passenger+1; $a++){
if( ${"psg_firstname".$a} == "" ||
	${"psg_lastname".$a} == "" ||
	${"psg_passport".$a} == "" ||
	${"psg_dateofbirth".$a} == "" ||
	${"psg_email".$a} == "" ||
	${"psg_phone".$a} == ""){ 
	$checkbutton = 0;
	echo "<div style ='color:#ff0000'>Passenger ".$a."'s infos are still left blank.</div><br>";
	}
	else{
		$checkbutton = 1;
	} }           
if($checkbutton == 1){
		?>	              
<h5>Your total cost is :</h5><?php 
							$basep = "select base_price as pls from flights where flight_id in (Select flight_num from routes where 
							origin_airport = '$from' and destination_airport = '$to') and date(depart_time) = '$depart'  ";
							$result = $mysqli->query($basep);
							$rorw = $result->fetch_array();
							
							$pricegee = $rorw['pls'];
							$plsp = (int)$pricegee;
							
							$sum = $plsp*$passenger;

							echo $plsp.' x '.$passenger.' = '.$sum;
							
							
}	?>
            </div>  
			<div class="col-md-3 "> 
                        
<?php
if ($checkbutton == 1){
	?>
	
         <form action="WA_booking_payment.php?idbooking=<?php echo $from . $to . $depart. $passenger ?>" method="post">

		<?php

for($a= 1 ;$a < $passenger+1; $a++){

?>
	<input type = "hidden" name="psg_firstname<?php echo $a?>" value="<?php echo ${"psg_firstname".$a}  ?>">
	<input type = "hidden" name="psg_lastname<?php echo $a?>" value="<?php echo ${"psg_lastname".$a}  ?>" >
	<input type = "hidden" name="psg_passport<?php echo $a?>" value="<?php echo ${"psg_passport".$a}  ?>">
	<input type = "hidden" name="psg_dateofbirth<?php echo $a?>" value="<?php echo ${"psg_dateofbirth".$a}  ?>">
	<input type = "hidden" name="psg_email<?php echo $a?>" value="<?php echo ${"psg_email".$a}  ?>">
	<input type = "hidden" name="psg_phone<?php echo $a?>" value="<?php echo ${"psg_phone".$a}  ?>">
	
<?php } ?>
<input class="list-group-item list-group-item-action active" type="submit" value="Confirm Booking" style="background-color: #0a1b4f;">
</form>

<?php } 

else{
	echo "<div style ='color:#ff0000'> Please go back and fill all the form.</div>";
}
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