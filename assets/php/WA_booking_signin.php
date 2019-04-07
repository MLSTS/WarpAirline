<?php
include_once 'WA_dbconnect.php';
//include_once 'WA_functions.php';
 
session_start();
$_SESSION["username"] = $_POST['username'];
$_SESSION["password"] = $_POST['password'];

if (isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if($username != "" && $password != "") {
        $password = hash('sha256',$password);
        $query = "SELECT person_id, username, password FROM person WHERE username = '".$username."' AND password = '".$password."'";
        
        if ($result = $mysqli->query($query)) {
            
            if (mysqli_num_rows($result) == 1) {
                $row = $result->fetch_array();
                $_SESSION['s_person_id'] = $row['person_id'];
				$_SESSION['s_user_name'] = $row['username'];
				
                //|| "PintusornS" || "WasuponP" || "NatthanichaS" || "TrongtrongV"
					
					$resend = $_GET['idbookings']; 
					
					header("Location: ../../Flights_select.php?idbookings=$resend");
				
				
	
				
            } else {
                echo "Wrong Username or Password.";
				?> <a href="../../index.php">Back to main page</a> <?php 
				session_destroy();
            }
            
        } else {
            echo "Query Failed.";
        }
        
    } else {
        echo "Invalid Input.";
    }
    
} else {
    echo "Invalid Request.";
}




