<?php
	require "../Control/Cuser.php";
	require "../Control/CFormateur.php";
	require "../Control/server.php";
	session_start();
	$user = new userinfo();
	$former = new formers();
	$row;
	$ut;
	$pic;
	if($_SESSION["login"] == "user"){
		$row = $user->SelectUser($con,$_SESSION["user"]);
		$ut = "profil";
		$pic = 10;
	}
	elseif($_SESSION["login"] == "formers"){
		$row = $former->SelectFormers($con,$_SESSION["user"]);
		$ut = "Formers";
		$pic = 12;
	}
	echo "<a href='profil.php'><p class='name-section-info-user'>$row[1]&nbsp;$row[2]</p></a>
		<img src='images/$ut/$row[$pic]' class='pic-section-info-user'>
		<div class='flish-info-user'></div>";
?>
			
        