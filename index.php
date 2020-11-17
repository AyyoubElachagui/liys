<?php 
session_start();
if($_SESSION["login"] != ""){
  header("Location: home.php");
}
else{
  $_SESSION["login"] = "";
  $_SESSION["UploadPicPost"] = "";
  $_SESSION["cpt"] = 0;
}
?>


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="css/mian.css">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <body style="background: rgb(23,123,141);">
              <!-- home header -->
              <a href="pages/Module/loginModule.php" class="loginBtn">Login</a>
              <header class="form-row home-header">
                  <div class="left-side col-md-6">
                      <h1><b> Welcome To Our WebSite </b><br> &nbsp;&nbsp;&nbsp;A Social Media <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and <br> &nbsp;&nbsp;Learning WebSite </h1>
                      <form method="post" action="pages/Module/RegistreUserModule.php">
                      <input type="submit" class="btn btn-primary getStartedBtn" name="getStarted" value="GET STARTED">
                          </form>
                  </div>
                  <div class="right-side col-md-6">
                      <img src="images/homePic.png"  width="100%" id="homeImg">
                  </div>
                  <span class="fa fa-facebook" id="fb-icon"></span><br>
                  <span class="fa fa-twitter" id="tw-icon"></span>
                  <div class="col-md-12 text-center mt-4">
                      <i class="fa fa-angle-double-down fa-2x" id="scrollItDown"></i>
                  </div>
              </header>
              <!-- about header -->
              <header class="form-row about-header">
                  <div class="left-side-about col-md-8">
                      <img src="images/aboutPic.png" id="aboutImg">
                  </div>
                  <div class="right-side-about col-md-4">
                      <h1>About<br>&amp;<br>Objectifs</h1>
                      <div class="separator"></div>
                      <p id="right-side-caption">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sem tortor vivamus sed turpis hendrerit sed. Elit, magna ac praesent nulla sed placerat. Quam posuere tincidunt integer ac turpis at nascetur eu. Integer tempus convallis odio in urna. Amet ultricies sed faucibus diam. In volutpat est semper suspendisse diam duis. Nisl erat eleifend nascetur netus faucibus. Ut at proin sit lobortis tincidunt est ut proin. Eu diam.
                      </p>
                  </div>
              </header>
              <!-- teacher header -->
              <header class="form-row teacher-header">
                  <div class="left-side-teacher col-md-4">
                      <h1>Sign Up as<br>A 'Teacher'</h1>
                      <div class="separator"></div>
                      <p class="left-side-caption-teacher">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sem tortor vivamus sed turpis hendrerit sed. Elit, magna ac praesent nulla sed placerat. Quam posuere tincidunt integer ac turpis at nascetur eu. Integer tempus convallis odio in urna. Amet ultricies sed faucibus diam. In volutpat est semper suspendisse diam duis. Nisl erat eleifend nascetur netus faucibus. Ut at proin sit lobortis tincidunt est ut proin. Eu diam.
                      </p>
                      <form method="post" action="pages/Module/RegistreFormersModule.php">
                        <input type="submit" name="teacherReg" class="btn btn-primary col-md-12 tc-btn" value="I'm ready" >
                      </form>
                  </div>
                  <div class="right-side-teacher col-md-8">
                      <img src="images/teacherPic.png" id="teacherImg">
                  </div>
              </header>
          </div>
        </div>
      </div>
    </div>
  </div>
	

    





  
</body>
</html>


