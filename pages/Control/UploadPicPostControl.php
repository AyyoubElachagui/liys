<?php
	session_start();
	$reponse ="";
    
			 $ext = array('gif' , 'jpg' , 'png');
			 $pic = $_FILES['file']['tmp_name'];
             $upload_folder = '../../images/UploadPic/';
            echo $_FILES["file"]["name"];
            if(isset($pic))
            {
                $name = $_FILES['file']['name'];
                $extn = end(explode('.' , $name));
                if(in_array($extn, $ext))
                {
                            $uploadpc = move_uploaded_file($pic, $upload_folder.$name);
                            if($uploadpc)
                            {
                                $_SESSION["UploadPicPost"] = $name;
                                $reponse = $_SESSION["UploadPicPost"];
                            }
                            
                }
                        else{
                                $reponse = "bad";
                            }
            }
            
    echo  $_SESSION["UploadPicPost"];
?>