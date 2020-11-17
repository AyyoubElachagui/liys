<?php
	require "server.php";
	require "Cuser.php";
	session_start();
	$user = new userinfo();
	$rsp = "Error";
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]); 
	$id_formers = $_GET["id"];
	$rst = $user->InvitFromers($con,$id_user,$id_formers);
	if($rst)
		$rsp = "Invit Formers Has SuccesFul";
	else
		$rsp = "bad"; 

echo $rsp;
?>