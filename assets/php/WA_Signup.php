<html>
    <body>
        <?php

        if (isset($_POST['WA_signupp'])) {
            require_once('WA_dbconnect.php');
            $ww_email = mysqli_real_escape_string($mysqli, trim($_POST['WASU_email']));
            $ww_username = mysqli_real_escape_string($mysqli, trim($_POST['WASU_username']));
            $ww_password = mysqli_real_escape_string($mysqli, trim($_POST['WASU_password']));
            $ww_confirmpassword = mysqli_real_escape_string($mysqli, trim($_POST['WASU_confirmpassword']));
            $ww_firstname = mysqli_real_escape_string($mysqli, trim($_POST['WASU_firstname']));
            $ww_lastname = mysqli_real_escape_string($mysqli, trim($_POST['WASU_lastname']));
            $ww_passport = mysqli_real_escape_string($mysqli, trim($_POST['WASU_passport']));
            $ww_phonenumber = mysqli_real_escape_string($mysqli, trim($_POST['WASU_phonenumber']));
            $ww_birthday = mysqli_real_escape_string($mysqli, trim($_POST['WASU_birthday']));
            $ww_gender = mysqli_real_escape_string($mysqli, trim($_POST['WASU_gender']));

            if ($ww_password == $ww_confirmpassword){
                if (
                    $ww_email != "" &&
                    $ww_username != "" &&
                    $ww_password != "" &&
                    $ww_firstname != "" &&
                    $ww_lastname != "" &&
                    $ww_passport != "" &&
                    $ww_phonenumber != "" &&
                    $ww_birthday != ""
                ) {
                    
                    if ($ww_gender == "on") {
                        $ww_gender = "M";
                    }
                    
                    elseif ($ww_gender == "") {
                        $ww_gender = "F";
                    }
                    
                    else {
                        $ww_gender = "N";
                    }
                    
                    $ww_password = hash('sha256',$ww_password);
                    
                    $getid = "SELECT max(CAST(person_id as signed)) as max_id FROM person ";
                    
                    require_once('WA_dbconnect.php');
                    $varid=$mysqli->query($getid);
                    $returnrow=$varid->fetch_array();
                    $returnid = $returnrow['max_id'];
                    $intid = (int)$returnid;
                    $intid++;
                    
                    $checkexist = "SELECT * FROM person WHERE email = '".$ww_email."' OR username = '".$ww_username."'";
                    $checkexist1 = $mysqli->query($checkexist);
                    $checkexist2 = $checkexist1->fetch_array();
                    if($checkexist2[0] > 1) {
                        header("Location: ../../index.php?r=WASU_userexist");
                    }
                    
                    else {
                        $query = "INSERT INTO person(person_id,passport,member,first_name,last_name,dateofbirth,gender,email,phone,username,password) " .
                                " VALUES('".$intid."','".$ww_passport."','Y','".$ww_firstname."','".$ww_lastname."','".$ww_birthday."','".$ww_gender."','".$ww_email."','".$ww_phonenumber."','".$ww_username."','".$ww_password."') ";
                    
                        require_once('WA_dbconnect.php');

                        if ($mysqli->query($query)) {
                        header("Location: ../../index.php?r=WASU_success");
                        }
                    }
                }
                
                else {
                        header("Location: ../../index.php?r=WASU_invalidinput");
                }
            }

            else {
                        header("Location: ../../index.php?r=WASU_passwordnotmatch");
            }
        }

        else {
                        header("Location: ../../index.php?r=WASU_invalidbypass");
        } ?>

    </body>
</html>
