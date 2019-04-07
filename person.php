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


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!------ Include the above in your HEAD tag ----------> 
<html>
<head>
<title>Dashboard</title>
</head>

<body>
<h9 style="color: #ffffff; font-size: 20px; background-color: #0a1b4f;        line-height: 42px;display:grid;grid-template-columns:1fr 1fr 0.2fr;grid-template-rows:48px;grid-template-areas:'Home Home Home Home Home About us Flight Deals Deals';grid-auto-columns:0px;grid-auto-rows:0px;grid-gap:0px;">
    <img src="assets/images/logos/WarpAirline_navlogo.png">
   <?php
			
if($username){
				if($username == "MatitL" || $username == "PintusornS" ||$username == "WasuponP" ||$username == "NatthanichaS"||$username == "TrongtrongV" || $member == "E"){?>
					<p align="right" style="color:#ffffff;">admin: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="assets/php/WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a>
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
<?php } 
else{ ?> 
					<p align="right" style="color:#ffffff;">username: <?php echo $username;?>&nbsp; &nbsp; 
					
					<a href="assets/php/WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a>
					<script type="text/javascript">
						document.getElementById("login").style.display = "none";
					</script> </p>
				<?php }
 } ?>


    <p><small><br></small></p>
</h9>
<?php
			//session_start(); // need it every time
			if(isset($_SESSION['s_user_name']) == 0)
			{	$homepage = "index.php";
				echo "<ul>You have to sign in to see this area.";
				echo "<br><a href ='".$homepage."'>Go to home page</a></ul>";
			}
			else{
			?>	

  
				
<div class="container"> 
    <div class="row"> 
        <div class="col-md-3 "> 
            <div class="list-group "> 
                <a href="person.php" class="list-group-item list-group-item-action active" style="background-color: #0a1b4f;">Dashboard</a> 
              
                <a href="assets/php/WA_myflight.php" class="list-group-item list-group-item-action">My Flight</a> 

				<a href="index.php" class="list-group-item list-group-item-action">Home</a> 
				<a href="assets/php/WA_process_signout.php" class="list-group-item list-group-item-action">Sign out</a> 
         
            </div>             
        </div>         
        <div class="col-md-9"> 
            <div class="card"> 
                <div class="card-body"> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <h4>Your Profile : <?php echo $username;?></h4> 
                            <hr> 
                      </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12"> 
<?php
$q="select * from person where username = '$username';";
$result=$mysqli->query($q);
$row=$result->fetch_array();		
						
?>							
                            <div> 
                                                                
                                <div class="form-group row"> 
                                    <label for="name" class="col-4 col-form-label">First Name</label>                                     
                                    <div class="col-8"> 
                                         <h5><?php echo $row['first_name']?></h5>
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>                                     
                                    <div class="col-8"> 
                                        <h5><?php echo $row['last_name']?></h5>
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="text" class="col-4 col-form-label">Date Of Birth*</label>                                     
                                    <div class="col-8"> 
                                        <h5><?php echo $row['dateofbirth']?></h5>
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="text" class="col-4 col-form-label">Gender</label>                                     
                                    <div class="col-8"> 
                                        <h5><?php if($row['gender'] == 'M')
										{echo 'Male';}
											else
											{echo'Female';}?></h5>
                                    </div>                                     
                                </div>     
								<div class="form-group row"> 
                                    <label for="passport" class="col-4 col-form-label">Passport ID*</label>                                     
                                    <div class="col-8"> 
                                        <h5><?php echo $row['passport']?></h5> 
                                    </div>                                     
                                </div> 								
                                <div class="form-group row"> 
                                    <label for="email" class="col-4 col-form-label">Email*</label>                                     
                                    <div class="col-8"> 
                                        <h5><?php echo $row['email']?></h5> 
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="website" class="col-4 col-form-label">Phone</label>                                     
                                    <div class="col-8"> 
                                        <h5><?php echo $row['phone']?></h5> 
                                    </div>                                     
                                </div>                                 
                                                              
                                <div class="form-group row"> 
                                    <div class="offset-4 col-8"> 
                                        <a href="person-edit.php"><button name="b1" class="btn btn-primary" style="background-color: #0a1b4f;">Edit My Profile</button></a>                                         
                                    </div>                                     
                                </div>                                 
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
						
			
			?>
</body>
</html>