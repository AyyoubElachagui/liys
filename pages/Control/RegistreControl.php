<?php
    require "Cuser.php";
    require "server.php";
    session_start();
    $lname = $fname = $filier = $phone = $gender = $level = "";
    $response = "Error";
        $new_user = new userinfo();
        $new_user->set_l_name($_POST["lname"]);
        $new_user->set_f_name($_POST["fname"]);
        $new_user->set_user_name($_POST["user"]);
        $new_user->set_email($_POST["email"]);
        $new_user->set_password($_POST["password1"],$_POST["password2"]);
        $new_user->set_filier($_POST["filier"]);
        $new_user->set_phone($_POST["phone"]);
        $new_user->set_gender($_POST["gender"]);
        $new_user->set_level($_POST["level"]);
        if($new_user->verifierChamps()){

            if(!empty($_SESSION["UploadPic"])){
                $status = 1;
                $add_user = $new_user->AddUser($con,$_SESSION["UploadPic"],$status);
                if($add_user){
                    $response = "nice";
                    $_SESSION["user"] = $_POST["email"];
                    $_SESSION["login"] = "user";
                }else{
                    $lname = $_POST["lname"];
                    $fname = $_POST["fname"];
                    $filier = $_POST["filier"];
                    $phone = $_POST["phone"];
                    $gender = $_POST["gender"];
                    $level = $_POST["level"];
                    $response = "bad add user !!  ";
                }
            }else $response = "bad uploaded pic !!";
        }else $response = "check all fields are not empty !!";

                    
    
            echo $response;
?>