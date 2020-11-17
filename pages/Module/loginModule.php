<?php
session_start();
	if($_SESSION["login"] != ""){
        header("Location: ../../home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login LIYS</title>
	 <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../js/login.js"></script>
</head>
<body>
	
	<div class="header-page-registre">
        <img class="bg-left-registre" src="../../images/icon/bg-reg.jpg">
		<div class="header-left-registre">
            <div class="circle-white"></div>
            <div class="circle-blue"></div>
		  <p class="title-header-left-registre">L<font>I</font>Y<font>S</font></p>
          <p class="dicriptionf-header-left-registre">Welcom To <font>Learn It Your Self</font></p>
          <p class="dicriptions-header-left-registre">Login <font>Now</font></p>
		</div>
	<div class="section-login">
		<div class="select-UserOrFormers">
			<input type="submit" name="user" class="btn-select-log-user" id="#userSelect" value="User">
			<input type="submit" name="formers" class="btn-select-log-formers" value="Formers">
		</div>
		<form method="post">	
			<table>
				<tr>
					<th><h1 class="login-title">Login</h1></th>
				</tr>
				<tr>
					<th><label class="login-user-name">User Name Or Email</label><input class="inputl-user-name" type="text" name="loginUser" id="input-user-name"></th>
				</tr>
				<tr>
					<th><label class="login-password">Password</label><input class="inputl-password" type="Password" name="loginpw" id="input-user-pw"></th>
				</tr>
				<tr>
					<th><input type="submit" name="loginsub" value="Login" class="inputl-login" id="loginBTN"></th>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>