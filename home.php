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
                <a href="profil.php"><p class="slidBar-profil">Profil</p></a>
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
			<div class="add-post">
                    <img class="icon-plus-post" src="images/icon/plus.png">
                    <input type="submit" name="btn-add-post" class="btn-add-post" value="Add Post">
                
			</div>
            <div class="section-add-post">
                <form method="post">
                    <p>Exprimez-vous</p>
                    <textarea type="text" cols="24" rows="4" name="InpSectionAddPost" class="inp-section-add-post" placeholder="Exprimez-vous... "></textarea>
                    <input type="file" id="file" name="file" class="pic-section-add-post" >
                    <input type="button" name="btn-section-add-post" id="btnAddPost" class="btn-section-add-post" value="Publishing Post">
                </form> 
            </div>
			<div class="section-search">
                <form method="post">
                <img class="icon-search" id="iconSearch" src="images/icon/search.png">
                <input type="text" name="inp-search" class="inp-search" placeholder="Search Courses...">   
                </form>
            </div>
			<div class="section-notification">
				<img class="icon-notification" src="images/icon/notification.png">
				
				<div class="section-notification-news"></div>
			</div>
			<div class="section-info-user"></div>
		</div>
    <!------------------------ Section Courses ------------------------>
        
        <div class='section-see-course'>
            <p class='text-course'>Courses</p>
            <section class="section-course"></section>
        </div>
    <!------------------------ End ------------------------>
    <!------------------------ Section Formateur ------------------------>
        <div class="section-see-formateur">
            <p class="text-formateur">Formers</p>
			 <section class="section-formers"></section>
        </div>
    <!------------------------ End ------------------------>
    <!------------------------ Section Friends ------------------------>
        <div class="section-see-friends">
            <p class="text-friends">Friends</p>
            <section class="section-friends"></section>
        </div>
    <!------------------------ End ------------------------>
    <!------------------------ Section News ------------------------>
    <div class="section-see-news">
            <p class="text-news">News</p>
            <section class="sectionSeeNews"></section>
    </div>
    <!------------------------ End ------------------------>
     <!------------------------ Section Chat ------------------------>
    <div class="section-see-chat">
        <div class="div-icon-chat">
            <img src="images/icon/discussion.png" class="icon-chat">
        </div>
    </div>
    <div class="section-chat-friends-online">
        <div class="friends-online-slid"></div>
        <section class="active-chat-friend"></section>
    </div>
    <!------------------------ End ------------------------>
</body>
</html>
<?php }?>
