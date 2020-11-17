<?php
	require "Cuser.php";
	require "server.php";
	session_start();
	$user = new userinfo();
	$return = "";
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
	$id_friend = $_POST["idAccepte"];
	if($user->BlockFriends($con,$id_user,$id_friend)){
		$return = "block" ;
	}else{
		$return = "Error";
	}
echo $return;
?>