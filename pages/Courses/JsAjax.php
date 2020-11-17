<?php
    require "../Control/server.php";
    require "../Control/Cuser.php";
    session_start();
    if($_SESSION["login"] == ""){
        header("Location: ../../index.php");
    }
    $user  = new userinfo();
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn it yourself</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../js/burger.js"></script>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/ajaxCourse.js"></script>
</head>
<body>
          <div class="header-home">
            <button class="burger" id="burger">
              <input type="button" class="p-line">
              <input type="button" class="m-line">
              <input type="button" class="d-line">
            </button>
                  <div class="slidLeft-bar">
                      <a href="../Control/logOutControl.php">Deconnecte</a>
                  </div>
                <section class="Hours" style="position:absolute; left:45%;top:2%;color: rgb(229,240,255);"></section>
                  <div class="section-info-user"></div>
            <div class="section-notification">
              <img class="icon-notification" src="../../images/icon/notification.png">
              <div class="flish-notification"></div>
              <div class="section-notification-news"></div>
            </div>
            <div class="section-info-user"></div>
          </div>
           <!------------------------ Section Chat ------------------------>
          <div class="section-see-chat">
              <div class="div-icon-chat">
                  <img src="../../images/icon/discussion.png" class="icon-chat">
              </div>
          </div>
          <div class="section-chat-friends-online">
              <div class="friends-online-slid"></div>
              <section class="active-chat-friend"></section>
          </div>
          <!------------------------ End ------------------------>
              <div class="cours" style="color: white;">
                   <h1 style="margin-left: 39%;">Java Script  </h1>
                  <h2 style="margin-left: 34%;"> Cours et exercices corrigés </h2>
                <iframe src="coursesPDF/Js & Ajax.pdf" width="100%" height="500px">
                  
                  </iframe>
              </div>
            
    </body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    var h = 0;
    var m = 0;
    var s = 0;
    function hours(){
      s++;
      if(s == 60){
        s = 0;
        m++;
        if(m == 60){
          m = 0;
          h++;
          if(h == 24){
            h = 0;
          }
        }
            
      }
       $('.Hours').html("| "+h+" : "+m+" : "+s+" |");
      console.log();
    }
    setInterval(hours,1000);
   
  })
</script>