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
    <div class="slidBar-Profil">
            <button class="burger" id="burger">
                <input type="button" class="p-line">
                <input type="button" class="m-line">
                <input type="button" class="d-line">
            </button>
            <div class="slidLeft-bar">
                <a href="../../index.php"><p class="slidBar-profil">Home</p></a>
                <a href="#"><p class="slidBar-all-courses">All Formers</p></a>
                <a href="#"><p class="slidBar-all-formers">All Masseges</p></a>
                <a href="pages/Courses/AllCourses.php"><p  class="slidBar-all-massege">Setting</p></a>
                <a href="pages/Control/logOutControl.php"><p class="slidBar-Setting">Deconnecte</p></a>
            </div>
    <div>
      <section class="Hours" style="position:absolute;top:1.5rem;left: 40%;color: rgb(229,240,255);"></section>
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
    <br><br><br><br><br><br><br><br><br>
              <div class="container">
                <div class="row">
                  <?php
                    $command = "SELECT * from add_cour order by id desc";
                    $rst = mysqli_query($con,$command); 
                    $cpt = 0;
                    while($row = mysqli_fetch_row($rst)){
                  ?>
                  <div class="col-lg-3 col-md-4 col-sm-10">
                      <div id='<?php echo $row[0];?>'>
                         <form method='get'>
                            <div class='course-slid'>
                                <img src='../../images/courses/<?php echo $row[2];?>' class='pic-course'>
                                <p class='name-course name-course<?php echo $row[0];?>'><?php echo $row[1];?></p><br>
                                <p class='title-course'>Course</p>
                                <img src='../../images/icon/play.png' class='play-course playCour<?php echo $row[0];?>' id='<?php echo $row[0];?>'>
                            </div>
                        </form>
                      </div>
                    <script>
                        $(document).ready(function(){
                                var v = $('.name-course<?php echo $row[0];?>').text().length;
                                if(v > 10  ){
                                    $('.name-course<?php echo $row[0];?>').css('font-size','0.7rem');
                                }
                            $('.playCour<?php echo $row[0];?>').click(function(e){
                                e.preventDefault();
                                window.location = '/LIYS/pages/Courses/<?php echo $row[3];?>';
                            })
                        })
                    </script>
                  </div>
                  <?php
                }
                ?>
                </div>
              </div>
            
           
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