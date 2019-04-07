<?php

    if (isset($_POST['WA_customersupportp'])) {
        require_once('WA_dbconnect.php');
        $ww_name = mysqli_real_escape_string($mysqli, trim($_POST['WACS_name']));
        $ww_email = mysqli_real_escape_string($mysqli, trim($_POST['WACS_email']));
        $ww_subject = mysqli_real_escape_string($mysqli, trim($_POST['WACS_subject']));
        $ww_message = mysqli_real_escape_string($mysqli, trim($_POST['WACS_message']));

        if (
            $ww_name != "" &&
            $ww_email != "" &&
            $ww_subject != "" &&
            $ww_message != ""
            ) {
            
            $query = "INSERT INTO customersupport(name,email,subject,message) " .
                     " VALUES('".$ww_name."','".$ww_email."','".$ww_subject."','".$ww_message."') ";
            
            require_once('WA_dbconnect.php');
            
            if ($mysqli->query($query)) {
                header("Location: ../../index.php?r=WACS_success");
            }
            
        }
            
        else {
            header("Location: ../../index.php?r=WACS_invalidinput");
        }
            
    }
        
    else {
        header("Location: ../../index.php?r=WASU_invalidbypass");
    }

?>
