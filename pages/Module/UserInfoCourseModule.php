<?php
  require "../Control/Cuser.php";
  require "../Control/server.php";
  session_start();
  $user = new userinfo();
  $row = $user->SelectUser($con,$_SESSION["user"]);
  echo "<p class='name-section-info-user'>$row[1]&nbsp;$row[2]</p>
    <img src='../../images/profil/$row[10]' class='pic-section-info-user'>
    <div class='flish-info-user'></div>";
?>
      
        