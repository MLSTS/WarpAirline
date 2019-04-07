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
<title>Edit Profile</title>
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
<?php
$q="select * from person where username = '$username';";
$result=$mysqli->query($q);
$row=$result->fetch_array();		
						
?>		
        <div class="col-md-9"> 
            <div class="card"> 
                <div class="card-body"> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <h4>Your Profile : <?php echo $row['username'];?></h4> 
                            <hr> 
                        </div>                         
                    </div>                     
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <form action="assets/php/WA_editprofile.php" method="post"> 
                                                            
                                <div class="form-group row"> 
                                    <label for="name" class="col-4 col-form-label">First Name</label>                                     
                                    <div class="col-8"> 
                                        <input id="name" name="fname" value="<?php echo $row['first_name']?>" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>                                     
                                    <div class="col-8"> 
                                        <input id="lastname" name="lastname" value="<?php echo $row['last_name']?>" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="text" class="col-4 col-form-label">Date Of Birth*</label>                                     
                                    <div class="col-8"> 
                                        <input id="text" name="dob"  class="form-control here" type="date" value="<?php echo $row['dateofbirth']?>"> 
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="select" class="col-4 col-form-label">Gender</label>                                     
                                    <div class="col-8"> 
                                        <select id="select" name="gender" class="custom-select" value="<?php echo $row['gender']?>"> 
                                            <option value="M">Male</option>                                             
                                            <option value="F">Female</option>
                                        </select>                                         
                                    </div>                                     
                                </div>    
								<div class="form-group row"> 
                                    <label for="passport" class="col-4 col-form-label">Passport ID*</label>                                     
                                    <div class="col-8"> 
                                        <input id="passport" name="passport" value="<?php echo $row['passport']?>" class="form-control here"  type="text"> 
                                    </div>                                     
                                </div> 								
                                <div class="form-group row"> 
                                    <label for="email" class="col-4 col-form-label">Email*</label>                                     
                                    <div class="col-8"> 
                                        <input id="email" name="email" value="<?php echo $row['email']?>" class="form-control here"  type="email"> 
                                    </div>                                     
                                </div>                                 
                                <div class="form-group row"> 
                                    <label for="website" class="col-4 col-form-label">Phone</label>                                     
                                    <div class="col-8"> 
                                        <input id="phone" name="phone" value="<?php echo $row['phone']?>" class="form-control here" type="text"> 
                                    </div>                                     
                                </div>                                 
                                                         
                                <div class="form-group row"> 
                                    <div class="offset-4 col-8"> 
                                        <button name="submit" type="submit" class="btn btn-primary" style="background-color: #0a1b4f;">Update My Profile</button>                                         
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
						
			
			?>
</body>
</html>