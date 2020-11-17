<?php
	require "server.php";
	require "Cuser.php";
	session_start();
	$user = new userinfo();
	session_destroy();
	$tst = "";
	if($_SESSION["login"] == "user"){
		$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
		$cmd = "UPDATE user_ set status_ = 0 where id = $id_user ";
		if(mysqli_query($con,$cmd)){
			$_SESSION["login"] = "";
			$tst = "nice";
		}
	}elseif($_SESSION["login"] == "formers"){
		$_SESSION["login"] = "";
		$tst = "nice";
	}else{
		$_SESSION["login"] = "";
		$tst = "nice";
	}
		
			
echo $tst;
?>