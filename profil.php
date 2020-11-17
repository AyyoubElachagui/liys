<?php
    require "pages/Control/server.php";
    require "pages/Control/Cuser.php";
    session_start();
    if($_SESSION["login"] == ""){
        header("Location: index.php");
    }elseif($_SESSION["login"] == "admin"){
        echo "admin";
        echo "<form action='pages/Control/logOutControl.php'><input type='submit' name='submit' class='deconnecte' value='Deconnecte'></form>";
    }else{

        $user  = new userinfo();

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
    <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
        <div class="header-home">
            <button class="burger" id="burger">
                <input type="button" class="p-line">
                <input type="button" class="m-line">
                <input type="button" class="d-line">
            </button>
            <div class="slidLeft-bar">
                <a href="index.php"><p class="slidBar-profil">Home</p></a>
                <a href="pages/Courses/AllCourses.php"><p class="slidBar-all-courses">All Courses</p></a>
                <?php if($_SESSION["login"] == "user"){?>
                <a href="AllFormers.php"><p class="slidBar-all-formers">All Formers</p></a>
                <?php }elseif($_SESSION["login"] == "formers"){?>
                <a href="AllFormers.php"><p class="slidBar-all-formers">Add Cours </p></a>
                <?php }?>
                <a href="AllMassege.php"><p class="slidBar-all-massege">All Masseges</p></a>
                <a href="pages/Courses/AllCourses.php"><p class="slidBar-Setting">Setting</p></a>
                <input type="submit" name="submit" class="deconnecte deconnecteBTN" value="Deconnecte">
            </div>
            <div class="add-post-profil">
                    <img class="icon-plus-post-profil" src="images/icon/plus.png">
                    <input type="submit" name="btn-add-post" class="btn-add-post btn-add-post-profil" value="Add Post">
                
            </div>
            <div class="section-add-post" id="section-add-post-profil">
                <form method="post">
                    <p>Exprimez-vous</p>
                    <textarea type="text" cols="24" rows="4" name="InpSectionAddPost" class="inp-section-add-post" placeholder="Exprimez-vous... "></textarea>
                    <input type="file" id="file" name="file" class="pic-section-add-post" >
                    <input type="button" name="btn-section-add-post" id="btnAddPost" class="btn-section-add-post" value="Publishing Post">
                </form> 
            </div>
            <div class="section-notification">
                <img class="icon-notification" src="images/icon/notification.png">
                
                <div class="section-notification-news"></div>
            </div>
            <div class="section-info-user"></div>
        </div>
    <!------------------------ Section header  ------------------------>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="slid-user-info-profil">
                        <h3>Profile</h3>
                        <?php $row = $user->SelectUser($con,$_SESSION["user"]);?>
                        <img src="images/profil/<?php echo $row[10]; ?>" class="pic-user-info-profil">
                        <p class="fname-user-info-profil">First Name : <font><?php echo $row[2]; ?></font></p><br>
                        <p class="lname-user-info-profil">Last Name&nbsp; : <font><?php echo $row[1]; ?></font></p><br>
                        <p class="sipnneret-user-info-profil">Sipnneret&nbsp;&nbsp;&nbsp; : <font><?php echo $row[6]; ?></font></p><br>
                        <p class="phone-user-info-profil">Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <font><?php echo $row[7]; ?></font></p><br>
                        <p class="gender-user-info-profil">Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <font><?php echo $row[8]; ?></font></p><br>
                        <p class="level-user-info-profil">Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <font><?php echo $row[9]; ?></font></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="slid-user-courses-profil">
                        <h3>Courses</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="images/courses/jQuery.png" class="pic-courses-profil">
                                    <img src="images/courses/c.png" class="pic-courses-profil">
                                </div>
                                <div class="col-lg-4">
                                    <img src="images/courses/js.png" class="pic-courses-profil">
                                    <img src="images/courses/JsAjax.png" class="pic-courses-profil">
                                </div>
                                <div class="col-lg-4">
                                    <img src="images/courses/php.png" class="pic-courses-profil">
                                    <img src="images/courses/webprogramming.png" class="pic-courses-profil">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="slid-user-formers-profil">
                        <h3>Formers</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="images/Formers/f1.jpg" class="pic-courses-profil">
                                    <img src="images/Formers/f2.jpg" class="pic-courses-profil">
                                </div>
                                <div class="col-lg-4">
                                    <img src="images/Formers/f3.jpg" class="pic-courses-profil">
                                    <img src="images/Formers/f4.jpg" class="pic-courses-profil">
                                </div>
                                <div class="col-lg-4">
                                    <img src="images/Formers/f5.jpg" class="pic-courses-profil">
                                    <img src="images/Formers/f6.jpg" class="pic-courses-profil">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="slid-user-friends-profil">
                        <h3>Friends</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="images/UploadPic/IMG-20170807-WA0017.jpg" class="pic-courses-profil">
                                    <img src="images/UploadPic/IMG-20170814-WA0000.jpg" class="pic-courses-profil">
                                </div>
                                <div class="col-lg-6">
                                    <img src="images/UploadPic/IMG-20170814-WA0001.jpg" class="pic-courses-profil">
                                    <img src="images/UploadPic/IMG-20171013-WA0049.jpg" class="pic-courses-profil">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-see-news-profil">
            <p class="text-news">News</p>
            <section class="sectionSeeNewsProfil"></section>
    </div>
    </body>
</html>
<?php }?>