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

<html lang="en">


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>WarpAirline - Experience a Swift</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    
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

                    <form action="assets/php/WA_process_signin.php" method="POST">

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



    <div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel" aria-hidden="true" data-focus-on="input:first">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="SignupModalLabel">Sign up</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">



                    <form action="assets/php/WA_Signup.php" method="POST">

                        <div id="accordion">

                            <div class="card">

                                <div class="card-header" id="signupMainCard">

                                    <h5 class="mb-0">

                                        <button class="btn btn-link" data-toggle="collapse" data-target="#signupMain" aria-expanded="true" aria-controls="signupMain">Account Infomation</button>

                                    </h5>

                                </div>

                            </div>

                            

                            <div id="signupMain" class="collapse show" aria-labelledby="signupMainCard" data-parent="#accordion">

                                <div class="card-body">

                                    <div class="form-group">

                                        <label for="email" class="col-form-label">Email:</label>

                                        <input type="email" class="form-control" id="email" name="WASU_email" placeholder="JohnD@domain.com" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="username" class="col-form-label">Username:</label>

                                        <input type="text" class="form-control" id="username" name="WASU_username" placeholder="JohnD" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="password" class="col-form-label">Password:</label>

                                        <input type="password" class="form-control" id="password1" name="WASU_password" placeholder="Password" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="comfirmpassword" class="col-form-label">Comfirm Password:</label>

                                        <input type="password" class="form-control" id="confirmpassword1" name="WASU_confirmpassword" placeholder="Confirm Password" required>
                                        
                                        <span id='matchmessage'></span>
                                        
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="card">

                                <div class="card-header" id="signupSecondaryCard">

                                    <h5 class="mb-0">

                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#signupSecondary" aria-expanded="false" aria-controls="signupSecondary">Personal Infomation</button>

                                    </h5>

                                </div>

                            </div>

                            

                            <div id="signupSecondary" class="collapse" aria-labelledby="signupSecondaryCard" data-parent="#accordion">

                                <div class="card-body">

                                    <div class="form-group">

                                        <label for="firstname" class="col-form-label">First Name:</label>

                                        <input type="text" class="form-control" id="firstname" name="WASU_firstname" placeholder="John" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="lastname" class="col-form-label">Last Name:</label>

                                        <input type="text" class="form-control" id="lastname" name="WASU_lastname" placeholder="Doe" required>

                                    </div>
									<div class="form-group">
                                        <label for="lastname" class="col-form-label">Passport ID:</label>
                                        <input type="text" class="form-control" id="lastname" name="WASU_passport" placeholder="AA1234567" required>
                                    </div>

                                    <div class="form-group">

                                        <label for="phonenumber" class="col-form-label">Phone Number:</label>

                                        <input type="text" class="form-control" id="phonenumber" name="WASU_phonenumber" placeholder="66812345678" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="birthday" class="col-form-label">Your Birthday:</label>

                                        <input type="date" class="form-control" id="birthday" name="WASU_birthday" placeholder="YYYY/MM/DD"  required>

                                    </div>

                                    <div class="form-group">

                                        <label for="gender" class="col-form-label">Gender:</label>
                                        
                                        <input type="checkbox" checked id="gender" name="WASU_gender" data-toggle="toggle" data-on="Male" data-off="Female" data-onstyle="primary" data-offstyle="primary" data-width="150" data-height="25">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="reset" class="btn btn-outline-secondary" id="ClearButton">Clear</button>

                            <button type="button" class="btn btn-outline-success" id="SigninButton" data-dismiss="modal" data-toggle="modal" data-target="#SigninModal">Sign in</button>

                            <button type="submit" class="btn btn-primary btn-block" id="SignupButton" name="WA_signupp">Sign up</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>



    <div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="ForgotModalLabel" aria-hidden="true" data-focus-on="input:first">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="ForgotModalLabel">Forgot username or password</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form action="assets/php/WA_Forgot.php">

                        <div class="form-group">

                            <label for="email" class="col-form-label">Email:</label>

                            <input type="text" class="form-control" id="email" name="email" placeholder="JohnD@domain.com" required>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-success" id="SigninButton" data-dismiss="modal" data-toggle="modal" data-target="#SigninModal">Sign in</button>

                            <button type="submit" class="btn btn-danger btn-block" id="SendRecoveryEmailButton">Send recovery email</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>



    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #0A1B4F;">

        <div class="container">

            <a class="navbar-brand" href="https://warpairline.online/">

                <img src="assets/images/logos/WarpAirline_navlogo.png" class="d-inline-block align-top" alt="WarpAirline"></a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#top-navbar" aria-controls="top-navbar" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="top-navbar">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">

                        <a data-scroll class="nav-link" href="#Booking">Booking</a>

                    </li>

                    <li class="nav-item active">

                        <a data-scroll class="nav-link" href="#Flights">Flights</a>

                    </li>

                    <li class="nav-item active">

                        <a data-scroll class="nav-link" href="#Privileges">Privileges</a>

                    </li>

                    <li class="nav-item active">

                        <a data-scroll class="nav-link" href="#About">About</a>

                    </li>

                    <li class="nav-item active">

                        <a data-scroll class="nav-link" href="#Contact">Contact</a>

                    </li>

                </ul>



                <?php if(!$username){?>

				<button type="button" class="btn btn-outline-success" id="login" data-toggle="modal" data-target="#SigninModal">Sign in</button>

				<?php }?>

				<?php 

				if($username){

				

				if($username == "MatitL" || $username == "PintusornS" ||$username == "WasuponP" ||$username == "NatthanichaS"||$username == "TrongtrongV" || $member == "E"){?>

				

					<span style="color:#ffffff;">Welcome, admin <?php echo $username;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    <a href="person.php"><button type="button" class="btn btn-outline-primary" id="AccountButton">Account</button></a>&nbsp; 

					<a href="assets/php/WA_backend.php"><button type="button" class="btn btn-outline-primary" id="BackendButton">Manage</button></a>&nbsp; 

					<a href="assets/php/WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a> 

					

					<script type="text/javascript">

						document.getElementById("login").style.display = "none";

					</script>

				<?php } 

				else{ ?>

					<span style="color:#ffffff;">Welcome, user <?php echo $username;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    <a href="person.php"><button type="button" class="btn btn-outline-primary" id="AccountButton">Account</button></a>&nbsp; 

					 

					<a href="assets/php/WA_process_signout.php"><button type="button" class="btn btn-outline-success" id="SigninButton">Sign out</button></a> 

					

					<script type="text/javascript">

						document.getElementById("login").style.display = "none";

					</script>

					

				<?php }

				

				} ?>

				

            </div>

        </div>

    </nav>

    <section class="section" id="Booking">

        <div class="container">

            <ul class="nav nav-pills nav-fill" role="tablist">

                <li class="nav-item">

                    <a class="nav-link active" data-toggle="pill" href="#FlightsTab">Flights</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" data-toggle="pill" href="#ManageBookingsTab">Manage Bookings</a>

                </li>

            </ul>

            <div class="jumbtron p-2 p-sm-5" id="BookingJumbtron">

                <div class="tab-content">

                    <div id="FlightsTab" class="tab-pane container active">

                        <h2 class="display-6" id="BookingTitle">Fly with us!</h2>

                        <p class="lead" id="BookingP">Tired of long period flight?, Experience the fastest airline in the world with us now!</p>

                        <hr class="my-4" id="BookingHr">

						

						

						

                        <form action="Flights_select.php" method="post">

                            <div class="form-group">

                                <div class="form-row">

                                  <div class="col-sm">

                                        <div class="inner-addon left-addon">

											<h5 style="color: #FFFFFF;">From : </h5>

                                            <i class="fas fa-plane-departure"></i>

                                            <div id="Booking_AutoComplete">

												

												<select type="text" class="form-control" id="from" name="from" placeholder="FROM" required>

<?php

$q="SELECT * FROM `countries`;";

$result=$mysqli->query($q);

										

?>												

<?php while($row=$result->fetch_array()){ ?>												

												

												  <option value="<?php echo $row['name']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['name'];?></option>



		<?php } ?>										

											

												</select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm">

                                        <div class="inner-addon left-addon">

											<h5 style="color: #FFFFFF;">To : </h5>

                                            <i class="fas fa-plane-arrival"></i>

                                            <div id="Booking_AutoComplete">

                                                <select type="text" class="form-control" id="to" name="to" placeholder="To" required>

												<?php

$q="SELECT * FROM `countries`;";

$result=$mysqli->query($q);

										

?>												

<?php while($row=$result->fetch_array()){ ?>												

												

												  <option value="<?php echo $row['name']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['name'];?></option>



		<?php } ?>	

													</select>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="form-row">

                                    <div class="col-sm">

                                        <div class="inner-addon left-addon">

                                            <i class="fas fa-calendar-alt"></i>

                                            <div id="Booking_Calendar">

                                                <input type="date" class="form-control" id="depart" name="depart" placeholder="DEPART" required>

                                            </div>

                                        </div>

                                    </div>
									
                                        <div class="col-sm">
                                            <div class="inner-addon left-addon">
                                                <i class="fas fa-user"></i>
                                                <select type="text" class="form-control" id="passenger" name="passenger" placeholder="NUMBER OF PASSENGER(S)" required>
                                                    <option value="1">&nbsp;&nbsp;&nbsp;&nbsp;1 Person</option>
                                                    <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;2 Persons</option>
                                                    <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;3 Persons</option>
                                                    <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;4 Persons</option>
                                                    <option value="5">&nbsp;&nbsp;&nbsp;&nbsp;5 Persons</option>
                                                    <option value="6">&nbsp;&nbsp;&nbsp;&nbsp;6 Persons</option>
                                                    <option value="7">&nbsp;&nbsp;&nbsp;&nbsp;7 Persons</option>
                                                    <option value="8">&nbsp;&nbsp;&nbsp;&nbsp;8 Persons</option>
                                                    <option value="9">&nbsp;&nbsp;&nbsp;&nbsp;9 Persons</option>
                                                    <option value="10">&nbsp;&nbsp;&nbsp;&nbsp;10 Persons</option>
                                                </select>
                                            </div>
                                        </div>

                                  

                                    <div class="col-sm">

                                        <input class="btn btn-primary btn-block" type="submit" value="Find!">

                                    </div>

                                </div>

                            </div>

                        </form>

						

						

						

						

                    </div>

                    <div id="ManageBookingsTab" class="tab-pane container">

                        <h2 class="display-6" id="ManageBookingTitle">Access your booked flights</h2>

                        <p class="lead" id="ManageBookingP">Don't happy with your booking?, Enter your booking reference and your last name or Sign in to manage it.</p>

                        <hr class="my-4" id="ManageBookingHr">

                        <form action="assets/php/WA_managebookings.php">

                            <div class="form-group">

                                <div class="form-row">

                                    <div class="col-sm">

                                        <div class="inner-addon left-addon">

                                            <i class="fas fa-receipt"></i>

                                            <input type="email" class="form-control" id="passengeremail" name="WAAF_passengeremail" placeholder="EMAIL" required>

                                        </div>

                                    </div>

                                    <div class="col-sm">

                                        <div class="inner-addon left-addon">

                                            <i class="fas fa-id-card"></i>

                                            <input type="text" class="form-control" id="passengerlastname" name="WAAF_passengerlastname" placeholder="PASSENGER LAST NAME" required>

                                        </div>

                                    </div>

                                    <div class="col-sm">

                                        <button class="btn btn-primary btn-block" type="submit">Find!</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="section" id="Flights">

        <div class="container">

            <ul class="nav nav-pills nav-fill" role="tablist">

                <li class="nav-item">

                    <a class="nav-link active" data-toggle="pill" href="#RoundtripTab">Our Route</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" data-toggle="pill" href="#OnewayTab">Our Plane</a>

                </li>

            </ul>

            <div class="jumbtron p-2 p-sm-5" id="FlightsJumbtron">

                <div class="tab-content">

                    <div id="RoundtripTab" class="tab-pane container active">

                        <h2 class="display-6" id="FlightsTitle">Explore our Routes</h2>

                        <p class="lead" id="FlightsP">Let's see how many places you want to go. We do offers various routes to all destination in your mind.</p>

                        <hr class="my-4" id="FlightsHr">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Thailand</h5>

                                        <p class="card-text">Bangkok is the capital and most populous city of Thailand. It is known in Thai as Krung Thep Maha Nakhon or simply Krung Thep.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Germany</h5>

                                        <p class="card-text">Berlin is the capital and largest city of Germany by both area and population. it is the seat of the region of Barukl. Germany. Germany. Germany</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Finland</h5>

                                        <p class="card-text">Helsinki is the capital city and most populous municipality of Finland. Located on the shore of the Gulf of Finland, it is the seat of the region of Uusimaa in southern Finland.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Japan</h5>

                                        <p class="card-text">Tokyo officially Tokyo Metropolis, one of the 47 prefectures of Japan, has served as the Japanese capital since 1869. As of 2014 the Greater Tokyo Area.</p>
                                        
                                    </div>

                                </div>

                                <br>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Australia</h5>

                                        <p class="card-text">Canberra is the capital city of Australia. With a population of 403,468, it is Australia's largest inland city and the eighth-largest city overall. The city is located.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">Comming Soon</h5>

                                        <p class="card-text">We listen to your option and we will add more routes soon. We are always find a way or course taken in getting from a starting point to a destination for you no matter how far.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                        </div>

                    </div>

                    <div id="OnewayTab" class="tab-pane container">

                        <h2 class="display-6" id="FlightsTitle">Explore our Planes</h2>

                        <p class="lead" id="FlightsP">Let's see how many planes you want to look. We do offers various planes to all destination in your mind.</p>

                        <hr class="my-4" id="FlightsHr">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">WarpXO1</h5>

                                        <p class="card-text">The fastest long-range plane in the world.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">WarpXO2</h5>

                                        <p class="card-text">The fastest long-range plane in the world.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">WarpXO3</h5>

                                        <p class="card-text">The fastest long-range plane in the world.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">WarpAO4</h5>

                                        <p class="card-text">The fastest short-range plane in the world.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">WarpAO5</h5>

                                        <p class="card-text">The fastest short-range plane in the world.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">WarpAO6</h5>

                                        <p class="card-text">The fastest short-range plane in the world.</p>

                                    </div>

                                </div>

                                <br>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="section" id="Privileges">

        <div class="container">

            <ul class="nav nav-pills nav-fill" role="tablist">

                <li class="nav-item">

                    <a class="nav-link active" data-toggle="pill" href="#WarpPointsTab">50 Kg Load</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" data-toggle="pill" href="#PersonalAssistantTab">Personal Assistant</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" data-toggle="pill" href="#TravelInsuranceTab">Travel Insurance</a>

                </li>

            </ul>

            <div class="jumbtron p-2 p-sm-5" id="PrivilegesJumbtron">

                <div class="tab-content">

                    <div id="WarpPointsTab" class="tab-pane container active">

                        <div class="row">

                            <div class="col-lg-12 text-center">

                                <h2 class="display-6" id="PrivilegesTitle">Warp Points</h2>

                                <hr class="my-4" id="PrivilegesHr">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="card" style="">

                                    <img class="card-img-top" src="/assets/images/inline/WarpPoints.jpg" alt="Warp Points">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="card-body">

                                    <p class="lead" id="PrivilegesP">Free 50 Kg load is WarpAirline way of saying thank you for choosing to fly with us. Our members enjoy a range of exclusive privileges and benefits designed to make travelling with us even more rewarding. Save the load cost and book award tickets, cabin upgrades, excess baggage allowance and much more.

                                    <a class="btn-xs btn-link" data-toggle="collapse" href="#WarpPointsCollapse" role="button" aria-expanded="false" aria-controls="WarpPointsCollapse">Read more</a></p>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-12 collapse" id="WarpPointsCollapse">

                                <div class="card-body">

                                    <p class="lead" id="PrivilegesP">WarpAirline is a member of the  StarAlliance. StarAlliance is an alliance of the world's leading airlines committed to providing the highest level of service and convenience to frequent international travellers. StarAlliance airlines include: WarpAirline, Qatar Airways, airberlin, American Airlines, British Airways, Cathay Pacific, Finnair, Iberia, Japan Airlines, LAN, Malaysia Airlines, Qantas, Royal Jordanian, S7 Airlines, SriLankan Airlines, TAM Airlines and around 30 affiliates. Effective 1st March 2018, WarpAirline is offering members the courtesy of through check-in of themselves and their bags to their final destination when travelling on multi-sector journeys involving connections onto other StarAlliance member airlines, even when the trip is booked using separate tickets. However, members should note that through check-in may not be possible on a return journey if a trip starts with another airline that does not provide the same level of service.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div id="PersonalAssistantTab" class="tab-pane container">

                        <div class="row">

                            <div class="col-lg-12 text-center">

                                <h2 class="display-6" id="PrivilegesTitle">Personal Assistant</h2>

                                <hr class="my-4" id="PrivilegesHr">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="card" style="">

                                    <img class="card-img-top" src="/assets/images/inline/PersonalAssistant.jpg" alt="Personal Assistant">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="card-body">

                                    <p class="lead" id="PrivilegesP">An assistant helps with time and daily management, scheduling of meetings, correspondence, and note-taking. The role of a personal assistant can be varied, such as answering phone calls, taking notes, scheduling meetings, emailing, texts etc.

                                    <a class="btn-xs btn-link" data-toggle="collapse" href="#PersonalAssistantCollapse" role="button" aria-expanded="false" aria-controls="PersonalAssistantCollapse">Read more</a></p>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-12 collapse" id="PersonalAssistantCollapse">

                                <div class="card-body">

                                    <p class="lead" id="PrivilegesP">In business or personal contexts, assistants are people who provide services that relieve his or her employer from the stress of tasks that are associated with managing one’s personal and/or business life. They assist with a variety of life management tasks, including running errands, arranging travel (e.g., travel agent services such as purchasing airline tickets, reserving hotel rooms and rental cars, and arranging activities, as well as handling more localized services such as recommending a different route to work based on road or travel conditions), finance (paying bills, buying and selling stocks), and shopping (meal planning, remembering special occasions like birthdays).</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div id="TravelInsuranceTab" class="tab-pane container">

                        <div class="row">

                            <div class="col-lg-12 text-center">

                                <h2 class="display-6" id="PrivilegesTitle">Travel Insurance</h2>

                                <hr class="my-4" id="PrivilegesHr">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="card" style="">

                                    <img class="card-img-top" src="/assets/images/inline/TravelInsurance.jpg" alt="Travel Insurance">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="card-body">

                                    <p class="lead" id="PrivilegesP">While you're planning your next trip, our enterprise didn’t forget to include insurance protection for you. After all, the cost of insurance is free compared to the risk of being faced with a medical emergency expense while away from home.

                                    <a class="btn-xs btn-link" data-toggle="collapse" href="#TravelInsuranceCollapse" role="button" aria-expanded="false" aria-controls="TravelInsuranceCollapse">Read more</a></p>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-12 collapse" id="TravelInsuranceCollapse">

                                <div class="card-body">

                                    <p class="lead" id="PrivilegesP">That’s why WarpAirline can provide you with affordable coverage that includes: A toll-free number offering immediate, multilingual emergency assistance, available 24/7. Coverage for Trip Cancellation, Trip Interruption and Baggage & Personal Effects. Upfront payments for eligible emergency medical and hospital expenses whenever possible, so you won’t pay out of pocket. With travel insurance from WarpAirline you have the security of knowing you will receive the help you need during an emergency.  RBC Insurance has more than 40 years of experience and serves over 3 million customers annually.
</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="section" id="About">

        <div class="container">

            <ul class="nav nav-pills nav-fill" role="tablist">

                <li class="nav-item">

                    <a class="nav-link active" data-toggle="pill" href="#OurEnterpriseTab">Our Enterprise</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" data-toggle="pill" href="#OurTeamTab">Our Team</a>

                </li>

            </ul>

            <div class="jumbtron p-2 p-sm-5" id="AboutJumbtron">

                <div class="tab-content">

                    <div id="OurEnterpriseTab" class="tab-pane container active">

                        <h2 class="display-6" id="AboutTitle">Our Enterprise</h2>

                        <p class="lead" id="AboutP">Meet our enterprise - WarpAirline</p>

                        <hr class="my-4" id="AboutHr">

                        <div class="row">

                            <p class="lead" id="AboutP">WarpAirline is the flag carrier and the largest airline of the World by fleet size and passengers carried. The airline, founded in 2018, provides scheduled and charter air transport for passengers and cargo to 10 destinations worldwide. It is a founding member of the Star Alliance. WarpAirline's corporate headquarters are in Bangkok, Thailand, while its largest hub is at WarpGate International Airport. WarpAirline has a fleet of WarpXXXXXX, WarpXYYYYY, WarpXZZZZZ, and WarpXAAAAA Dreamliner wide-body aircraft on long-haul routes and uses the WarpX family aircraft, WarpBXXXXX, and WarpBYYYYY family aircraft on short-haul routes. The carrier's operating divisions include WarpAirline Cargo, WarpAirline Express, WarpAirline Jetz (private jet charters), and WarpAirline Rouge (leisure airline). Its subsidiary, WarpAirline Vacations, provides vacation packages to over 90 destinations. Together with its regional partners, the airline operates on average more than 1,602 scheduled flights daily.</p>

                        </div>

                    </div>

                    <div id="OurTeamTab" class="tab-pane container">

                        <h2 class="display-6" id="AboutTitle">Our Team</h2>

                        <p class="lead" id="AboutP">Meet our team - Founder members</p>

                        <hr class="my-4" id="AboutHr">

                        <div class="row">

                            <div class="col-lg">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-lg-4">

                                                <img src="/assets/images/inline/Person1.png">

                                            </div>

                                            <div class="col-lg-8">

                                                <h4 class="display-6">Matit Lee.</h4>

                                                <p>CEO</p>

                                                <p>The best person who generates warp gate.                         </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-lg-4">

                                                <img src="/assets/images/inline/Person1.png">

                                            </div>

                                            <div class="col-lg-8">

                                                <h4 class="display-6">Wasupon Pur.</h4>

                                                <p>Pilot</p>

                                                <p>The person who enter the warp gate and travel through time.        </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-lg-4">

                                                <img src="/assets/images/inline/Person1.png">

                                            </div>

                                            <div class="col-lg-8">

                                                <h4 class="display-6">Pintusorn Sut.</h4>

                                                <p>Asist. Pilot</p>

                                                <p>The peron who maintain the entrance and exit of warp gate.           </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">



                                            <div class="col-lg-4">

                                                <img src="/assets/images/inline/Person1.png">

                                            </div>

                                            <div class="col-lg-8">

                                                <h4 class="display-6">Natthanicha San.</h4>

                                                <p>Engineer</p>

                                                <p>The person who actually fly the plane and carry passengers.          </p>

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

    </section>

    <section class="section" id="Contact">

        <div class="container">

            <div class="jumbtron p-2 p-sm-5" id="ContactJumbtron" style="background-color: #FFFFFF">

                <h2 class="display-6" id="ContactTitle">Contact Us</h2>

                <p class="lead" id="ContactP">If you have any problem with your flights feel free to contact us at anytime!</p>

                <hr class="my-4" id="ContactHr">

                <div class="row">

                    <div class="col-md-8"> 

                        <form action="assets/php/WA_customersupport.php" method="POST">

                            <div class="row"> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <label for="name">Name:</label>                                         

                                        <input type="text" class="form-control" id="name" name="WACS_name" placeholder="Enter name" required="required"> 

                                    </div>                                     

                                    <div class="form-group"> 

                                        <label for="email">Email Address:</label>

                                        

                                        <input type="email" class="form-control" id="email" name="WACS_email" placeholder="Enter email" required="required">                                       

                                    </div>                                     

                                    <div class="form-group"> 

                                        <label for="subject">Subject:</label>                                         

                                        <select id="subject" name="WACS_subject" class="form-control" required="required">                                            

                                            <option value="General-Customer-Service">General Customer Service</option>                                             

                                            <option value="Suggestions">Suggestions</option>                                             

                                            <option value="Flight-Support">Flight Support</option>                                             

                                        </select>                                         

                                    </div>                                     

                                </div>                                 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <label for="name">Message:</label>                                         

                                        <textarea id="message" name="WACS_message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>                                         

                                    </div>                                     

                                </div>                                 

                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-primary pull-right" id="sendmessage" name="WA_customersupportp" style="background-color: #0a1b4f;">Send Message&nbsp;</button>

                                </div>                                 

                            </div>                             

                        </form>                                            

                    </div>                 

                    <div class="col-md-4"> 

                        <form> 

                            <legend>Our office</legend>                         

                            <address><strong>WarpAirline LLC</strong><br> 

                            999 Warp Ave, Suite 999<br> 

                            Bangkadi, Patumthani<br>

                            Tel (123) 456-7890</address> 

                            <address><strong>Full Name</strong><br>

                            <a href="mailto:#">warpairline@email.com</a></address> 

                        </form>                     

                    </div>

                </div>             

            </div>

        </div>

    </section>

    

    <footer>

        <div class="footer">

            <div class="row">

                <div class="col-md-12 mt-3">

                    <p class="text-center text-white">Copyright (©) 2018 WarpAirline LLC, All rights reserved.</p>

                </div>

            </div>

        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <script type="text/javascript">

        var scroll = new SmoothScroll('a[data-scroll]');

    </script>
    
    <script>
        
        var password = document.getElementById("password1"), confirmpassword = document.getElementById("confirmpassword1");
        function validatePassword(){
            if(password.value != confirmpassword.value) {
               confirmpassword.setCustomValidity("Passwords Don't Match");
               $('#matchmessage').html('Password is not matching!').css('color', 'red');
            } else {
                confirmpassword.setCustomValidity('');
                $('#matchmessage').html('Password is matching!').css('color', 'green');
            }
        }
        password.onchange = validatePassword;
        confirmpassword.onkeyup = validatePassword;
        
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>



</html>