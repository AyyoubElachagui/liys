<?php
    require "pages/Control/server.php";
    require "pages/Control/Cuser.php";
    require "pages/Control/CFormateur.php";
    session_start();
    if($_SESSION["login"] == ""){
        header("Location: index.php");
    }
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
     


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn it yourself</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/burger.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class="slidBar-Profil">
            <button class="burger" id="burger">
                <input type="button" class="p-line">
                <input type="button" class="m-line">
                <input type="button" class="d-line">
            </button>
            <div class="slidLeft-bar">
                <a href="index.php"><p class="slidBar-profil">Home</p></a>
                <a href="profil.php"><p class="slidBar-all-courses">Profil</p></a>
                <a href="AllMassege.php"><p class="slidBar-all-formers">All Masseges</p></a>
                <a href="pages/Courses/AllCourses.php"><p  class="slidBar-all-massege">Setting</p></a>
                <input type="submit" name="submit" class="deconnecte deconnecteBTN" value="Deconnecte">
            </div>
    <div>
      <section class="Hours" style="position:absolute;top:1.5rem;left: 40%;color: rgb(229,240,255);"></section>
            <div class="section-info-user"></div>
      <div class="section-notification">
        <img class="icon-notification" src="images/icon/notification.png">
        <div class="flish-notification"></div>
        <div class="section-notification-news">
            <?php

            $id_user = $user->SelectIdUser($con,$_SESSION["user"]);
            $invit_request = $user->ResponseInvit($con,$id_user);
            $cpt = true;
            for ($i=0; $i < count($invit_request); $i++) { 
                # code...
                $cpt = false;
                $row = $user->SelectUserId($con,$invit_request[$i]);
        ?>
                <form method='post'>
                    <div class='div-invit-notification <?php echo $row[0]; ?>' id='<?php echo $row[0]; ?>'>
                            <img src='images/profil/<?php echo $row[10]; ?>' class='pic-invit-notification'>
                            <p class='name-invit-notification'><?php echo $row[1].'&nbsp;'.$row[2]; ?></p>
                            <div class='accepte-invit'>
                                <input type='submit' name='accepte' class='<?php echo $row[0]; ?>' id='Accepte<?php echo $row[0]; ?>' value='Accepte'>
                            </div>
                            <div class='refuse-invit'>
                                <input type='submit' name='refuse' class='<?php echo $row[0]; ?>' id='Refuse<?php echo $row[0]; ?>' value='Refuse'>
                            </div>
                    </div>
                </form>
                <?php if($cpt == true){ ?>
                    <form method='post'>
                    <div class='div-invit-notification ' >
                            <p class='name-invit-notification'>There Is No New Notice</p>
                    </div>
                </form>
                <?php } ?>
                <script type='text/javascript'>
                    $(document).ready(function(){
                        $('#Accepte<?php echo $row[0]; ?>').click(function(e){
                            e.preventDefault();
                            var id_slid = $('.<?php echo $row[0]; ?>').attr('id');
                            var id_friend = $(this).attr('class');
                            $.ajax({
                                url : 'pages/Control/AccepteResponseInvitation.php',
                                method : 'POST',
                                data : {idAccepte : id_friend},
                                datatype : 'text',
                                success : function(e){
                                    if(e == 'nice'){
                                        alert('Accepte Has SuccessFul');
                                        $('#'+id_slid).hide(500);
                                        }else alert(e);
                                }

                            })
                       })
                        $('#Refuse<?php echo $row[0]; ?>').click(function(e){
                            e.preventDefault();
                            var id_slid = $('.<?php echo $row[0]; ?>').attr('id');
                            var id_friend = $(this).attr('class');
                            $.ajax({
                                url : 'pages/Control/RefuseResponseInvitation.php',
                                method : 'POST',
                                data : {idAccepte : id_friend},
                                datatype : 'text',
                                success : function(e){
                                    if(e == 'block'){
                                        alert('Block Has SuccessFul');
                                        $('#'+id_slid).hide(500);
                                    }
                                    else
                                        alert(e);
                                }

                            })
                       })
                    })
                </script>
        <?php
            }
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
        ?>

        </div>
      </div>
      <div class="section-info-user">
        <a href='profil.php'><p class='name-section-info-user'><?php echo $row[1]."&nbsp".$row[2];?></p></a>
        <img src='images/<?php echo $ut;?>/<?php echo $row[$pic]?>' class='pic-section-info-user'>
      </div>
    </div>
    <!------------------------ Section Formateur ------------------------>
        <div class="section-see-formateur">
            <p class="text-formateur">Formers</p>
             <section class="section-formers">
                 <?php
    $cmd = "SELECT * FROM formateur where status_ = 1";
    $rst = mysqli_query($con,$cmd);
    while ($row = mysqli_fetch_row($rst)) {
            # code...
        
    ?>
    <form method='get'>
                    <div class='formateur-slid'>
                        <img src="images/profil/<?php echo $row[12]; ?>" class="pic-formateur">
                        <p class="name-formateur"><?php echo $row[1]."<br>".$row[2]; ?></p>
                        <p class="title-formateur"><?php echo "Sipnneret :".$row[7]; ?></p>
                        <img src="images/icon/add-button.png" class="add-formateur">
                        <img src="images/icon/icon.png" class="refuse-formateur">
                    </div>
                </form>

    <?php

    }
    ?>
             </section>
        </div>
    <!------------------------ End ------------------------>
    </body>
</html>