<?php
	require "Cuser.php";
	require "server.php";
	session_start();
	$id_user = $_POST['id_user'];
	$id_friend = $_POST['id_friend'];
	$massege = $_POST['massege'];
	$date = date("D, d M Y H:i:s");
	$cmd = "INSERT INTO chat_friend values (null,'$id_user','$id_friend','$massege','$date')";
	if(mysqli_query($con,$cmd)){
		echo "nice";
	}else{
		echo "bad";
	}
	
?>