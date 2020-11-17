<?php
    require "CFormateur.php";
    require "server.php";
    session_start();
    $lname = $fname = $userName = $cin = $email = $centre = $pw = $filier = $phone = $gender = $rst = "";
        $new_Formateur = new formers();
        $new_Formateur->set_l_name($_POST["lname"]);
        $new_Formateur->set_f_name($_POST["fname"]);
        $new_Formateur->set_user_name($_POST["user"]);
        $new_Formateur->set_cin($_POST["cin"]);
        $new_Formateur->set_email($_POST["email"]);
        $new_Formateur->set_centreFormation($_POST["centre"]);
        $new_Formateur->set_password($_POST["password1"],$_POST["password2"]);
        $new_Formateur->set_filier($_POST["filier"]);
        $new_Formateur->set_phone($_POST["phone"]);
        $new_Formateur->set_gender($_POST["gender"]);

        $lname = $new_Formateur->get_l_name();
        $fname = $new_Formateur->get_f_name();
        $userName = $new_Formateur->get_user_name();
        $cin = $new_Formateur->get_cin();
        $email = $new_Formateur->get_email();
        $centre = $new_Formateur->get_centreFormation();
        $pw = $new_Formateur->get_password();
        $filier = $new_Formateur->get_filier();
        $phone = $new_Formateur->get_phone();
        $gender = $new_Formateur->get_gender();
        $status = 0;
        $pic = $_SESSION["UploadPicF"];
       if($new_Formateur->verifierChamps()){
                    $command = "SELECT user_name,Email from formateur WHERE user_name = '$userName' or Email = '$email'";
                        $result  = mysqli_query($con,$command);
                        $n = mysqli_num_rows($result);
                        if ($n > 0) {
                                $rst = "deja existe";
                        }else{
                            $rst =  $_SESSION["UploadPicF"];
                            $cmd = "INSERT INTO `formateur` VALUES (null,'$lname','$fname','$cin','$userName','$email','$pw','$filier','$phone','$gender','$centre','$status','$pic')";
                            if(mysqli_query($con,$cmd)){
                                $rst = "insert";
                                $_SESSION["user"] = $userName;
                                $_SESSION["login"] == "formers";
                            }else{
                                $rst = "bad"; 
                            }
                        }
                    
               }
          echo $rst; 

?>