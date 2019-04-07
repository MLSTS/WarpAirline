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
<title>Booking | Passenger Info</title>
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
                            <h4>Passenger Information</h4> 
                            <hr> 
                      </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12">
						
						
                            <div> 

									
				<h5>From: <?php echo $from?>&nbsp;&nbsp; To: <?php echo $to?>&nbsp;&nbsp;&nbsp;<?php echo $passenger ?> passenger(s)</h5>
									<form action="WA_booking_confirm_info.php?idbooking=<?php echo $from . $to . $depart. $passenger ?>" method="post"> 
<?php								
	 	for($a= 1 ;$a < $passenger+1; $a++){
		
	
		echo '<hr>';
		echo '<h5><b>passenger numer '.$a.'</b></h5><br>';

										
							  ?>                  
                               <div class="form-group row"> 
                                    <label for="bk_firstname" class="col-4 col-form-label">Firstname</label>                                     
                                    <div class="col-8"> 
                                        <input id="bk_firstname" name="bk_firstname<?php echo $a ?>" placeholder="e.g. John" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="bk_lastname" class="col-4 col-form-label">Last Name</label>                                     
                                    <div class="col-8"> 
                                        <input id="bk_lastname" name="bk_lastname<?php echo $a ?>" placeholder="e.g. Doe" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="bk_passport" class="col-4 col-form-label">Passport ID</label>                                     
                                    <div class="col-8"> 
										
										<?php //echo $bk_passport[$a] = 'bk_firstname'.$a ;   ?>
									<input id="bk_passport" name="bk_passport<?php echo $a ?>" placeholder="e.g. AA1234567" class="form-control here" type="text"> 
                                    
									</div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="bk_dateofbirth" class="col-4 col-form-label">Date of birth</label>                                     
                                    <div class="col-8"> 
                                        <input id="bk_dateofbirth" name="bk_dateofbirth<?php echo $a ?>" placeholder="YYYY-MM-DD" class="form-control here" type="date"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="bk_email" class="col-4 col-form-label">Email</label>                                     
                                    <div class="col-8"> 
                                        <input id="bk_email" name="bk_email<?php echo $a ?>" placeholder="e.g. John.doe@email.com" class="form-control here" type="email"> 
                                    </div>                                     
                                </div>
								<div class="form-group row"> 
                                    <label for="bk_phone" class="col-4 col-form-label">Phone</label>                                     
                                    <div class="col-8"> 
                                        <input id="bk_phone" name="bk_phone<?php echo $a ?>" placeholder="e.g. 66899999999" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>
								
	<?php 
		}
	
	

	?>
	
				 <div class="form-group row"> 
                                    <div class="offset-4 col-8"> 
                                        <br><button name="submit" type="submit" class="btn btn-primary" style="background-color: #0a1b4f;">

										Confirm passenger information</button>  
							 </div>                                     
                                </div> 
							</form>
           
			
                                                           
                                                      
                                                                
                          </div>                             
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div> 
		
		<br>
<div class="row"> 
        <div class="col-md-2 "> 
            
				<a href="Flights_select.php?idbooking=<?php echo $from . $to . $passenger ?>" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">< Select a flight</a> 
                
         
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