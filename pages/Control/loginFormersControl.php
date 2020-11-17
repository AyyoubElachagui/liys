<?php
	require "server.php";
	require "Cuser.php";
	session_start();
	$tst = false;
		$user = $_POST["loginUser"];
		$pw = md5($_POST["loginpw"]);
		$command = "SELECT * from formateur WHERE (user_name = '$user' or email = '$user') and password = '$pw' ";
        $rst  = mysqli_query($con,$command);
        if($rst){
			if($row = mysqli_fetch_row($rst))
			{
					$_SESSION["user"] = $user;
					$_SESSION["login"] = "formers";
					$tst = "nice";
				
			}
		}
		echo $tst ;
		
?>