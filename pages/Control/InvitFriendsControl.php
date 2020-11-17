<?php
		require "server.php";
		require "Cuser.php";
		require "CFormateur.php";
		session_start();
		$user = new userinfo();
		$former = new formers();
		$rsp ;
		if($_SESSION["login"] == "user"){
			$id_user = $user->SelectIdUser($con,$_SESSION["user"]);
			if($user->AddFriends($con,$id_user,$_GET["id"])){
				$rsp = "nice";
			}else{
				$rsp = "bad";
			}
		}elseif($_SESSION["login"] == "formers"){
			$id_former = $former->SelectIdFormers($con,$_SESSION["user"]);
			$id_studiant = $_GET["id"];
			$status = 0;
			$cmd = "INSERT INTO `formersstudiant` VALUES (null,$id_former,$id_studiant,$status)";
			$rst = mysqli_query($con,$cmd);
			if($rst){
				$rsp = "nice";
			}else{
				$rsp = "bad".mysqli_error($con);
			}
		}
		
		echo $rsp;
		
?>