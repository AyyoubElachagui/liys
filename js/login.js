$(document).ready(function(){
    var path = "../Control/loginControl.php";
    //page Login
    function InputNotEmpty(){
        if($(".inputl-user-name").val() != "" )
            labelInputLogin("user-name");
        if($(".inputl-password").val() != "")
            labelInputLogin("password");
    }
    function InputEmpty(){
        if($(".inputl-user-name-active").val() == "" )
            labelInputLoginR("user-name");
        if($(".inputl-password-active").val() == "")
            labelInputLoginR("password");
    }
    setInterval(InputNotEmpty,200);
    setInterval(InputEmpty,100);
    function labelInputLogin(n){
            $(".login-"+n).addClass("login-"+n+"-active");
            $(".login-"+n+"-active").removeClass(".login-"+n);
            $(".inputl-"+n).addClass("inputl-"+n+"-active");
            $(".inputl-"+n+"-active").removeClass("inputl-"+n);
    }
    function labelInputLoginR(n){
        $(".login-"+n+"-active").addClass(".login-"+n);
        $(".login-"+n).removeClass("login-"+n+"-active");
        $(".inputl-"+n+"-active").addClass("inputl-"+n);   
        $(".inputl-"+n).removeClass("inputl-"+n+"-active");
            
    }
    function SelectUserFormers(user,formers){
        $(formers).css({
            'box-shadow' : "0.2rem 0.2rem 0.6rem black",
            'background' : "rgb(23,123,141)",
            'border' : '0.1rem solid rgb(229,249,255)',
            'font-size' : '0.8rem'
        });
        $(user).css({
            'box-shadow' : "-0.2rem -0.2rem 0.6rem black",
            'background' : "rgb(229,249,255)",
            'border' : '0.1rem solid rgb(23,123,141)',
            'font-size' : '1rem'
        });
    }
    SelectUserFormers(".btn-select-log-user",".btn-select-log-formers");
    $(".btn-select-log-user").click(function(e){
        e.preventDefault();
        SelectUserFormers($(this),".btn-select-log-formers");
        path = "../Control/loginControl.php";
    })
    $(".btn-select-log-formers").click(function(e){
        e.preventDefault();
        SelectUserFormers($(this),".btn-select-log-user");
        path = "../Control/loginFormersControl.php";
    })

    //Verifier login for open page home 
    $("#loginBTN").click(function(e){
        e.preventDefault();
        $.ajax({
            url : path,
            method : "post",
            data : $('form').serialize(),
            datatype :"html",
            success : function(e){
                if(e == "nice")
                    window.location = "/LIYS/home.php";
                else if(e == "admin") 
                    window.location = "/LIYS/home.php";
                else
                 alert("Please Create An Account Or Verify Your User Name And Password ");
            }
        })
    })
    
})  