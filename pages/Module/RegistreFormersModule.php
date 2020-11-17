<?php
session_start();
    if($_SESSION["login"] != ""){
        header("Location: ../../home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registre User Page</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../js/registre_animation_jquery.js"></script>
</head>
<body>
    <div class="header-page-registre">
        <img class="bg-left-registre" src="../../images/icon/bg-reg.jpg">
        <div class="header-left-registre">
            <div class="circle-white"></div>
            <div class="circle-blue"></div>
          <p class="title-header-left-registre">L<font>I</font>Y<font>S</font></p>
          <p class="dicriptionf-header-left-registre">Welcom To <font>Learn It Your Self</font></p>
          <p class="dicriptions-header-left-registre">Registre <font>Now</font></p>
        </div>
        <div class="header-right-registre">
            <form method="post" action="" enctype="multipart/form-data" >
            <table>
                <tr>
                    <td><label class="label-l-name" id="labelLName">Last name</label><input class="input-l-name " id="1" type="text" name="lname" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-f-name" id="labelFName">First name</label><input class="input-f-name " id="2" type="text" name="fname" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-cin" id="labelCin">CIN</label><input class="input-cin " id="12" type="text" name="cin" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-user-name-f" id="labelUserName">User name</label><input class="input-user-name-f " id="3" type="text" name="user" ></td>
                </tr>
                <tr>
                    <td><label class="label-email" id="labelEmail">Email</label><input class="input-email " id="4" type="text" name="email" ></td>
                </tr>
                <tr>
                    <td><label class="label-pwf" id="labelPwf">Password</label><input class="input-pwf " id="5" type="Password" name="password1" ></td>
                </tr>
                <tr>
                    <td><label class="label-pws" id="labelPws">Password conf</label><input class="input-pws " id="6" type="Password" name="password2" ></td>
                </tr>
                <tr>
                    <td><label class="label-filier" id="labelFilier">Filier</label><input class="input-filier " id="7" type="text" name="filier" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-phone" id="labelPhone">phone</label><input class="input-phone " id="8" type="text" name="phone" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-gender" id="labelGender">Gender</label><input class="input-gender " id="9" type="text" name="gender" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-CF" id="labelCF">Centre Formation</label><input class="input-CF" id="10" type="text" name="cf" value=""></td>
                </tr>
                <tr>
                    <td><label class="label-codecon" id="labelCodeC">Code Validation</label><input class="input-codecon " id="11" type="text" name="codecon" value=""></td>
                </tr>
                <tr>
                    <td>
                        <label class="label-pic-user" for="file" >
                        <img src="../../images/icon/photo-camera.png" class="logo-pic-user">
                                           <input type="file" name="file" class="input-pic-user" id="file"></label>
                    </td>
                </tr>
                <tr>
                    <td><input class="input-registre registreF" id="input-registre" type="submit" name="submit" value="Registre Now"></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>


