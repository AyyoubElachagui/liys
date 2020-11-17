<?php
	require "server.php";
	require "Ccourses.php";
	require "Cuser.php";
	session_start();
	$user = new userinfo();
	$course = new Courses();
	$rsp = "Error";
	$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
	$id_cours = $_GET["id"];
	$rst = $course->CouseLearning($con,$id_user,$id_cours);
	if($rst){
		$rsp = "nice";
	}else $rsp = "bad".mysqli_error($con);
	echo $rsp;

?>