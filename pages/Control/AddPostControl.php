<?php
	require "Cuser.php";
	require "server.php";
	session_start();
	$response="";
	$user = new userinfo();
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
	$statut = $user->test_input($_POST['InpSectionAddPost']);
	$pic = $_SESSION['UploadPicPost'];
	if((!empty($statut) && !empty($pic)) || !empty($statut)){
		$date = date("D, d M Y H:i:s");
		$cmd = "INSERT INTO news values (null,'$id_user',null,'$statut','$pic','$date')";
		if(mysqli_query($con,$cmd)){
			$response = "nice";
		}else{
			$response = "Try Agin ";
		}
	}else $response = "Your Post Is Empty";
	echo $response;
?>