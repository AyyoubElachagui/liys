<?php
	require "Cuser.php";
	require "server.php";
	session_start();
	$user = new userinfo();
	$return = "";
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
	$id_friend = $_POST["idAccepte"];
	if($user->AccepteFriends($con,$id_user,$id_friend)){
		$return = "nice" ;
	}else{
		$return = "bad";
	}
echo $return;
?>