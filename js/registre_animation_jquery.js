$(document).ready(function(){

        var cpt = 0;
    // page registreUser
    function InputNotEmpty(){
        if($(".input-l-name").val() != "" )
            labelInputEvent("l-name");
        if($(".input-f-name").val() != "")
            labelInputEvent("f-name");
        if($(".input-user-name").val() != "")
            labelInputEvent("user-name");
        if($(".input-cin").val() != "")
            labelInputEvent("cin");
        if($(".input-user-name-f").val() != "")
            labelInputEvent("user-name-f");
        if($(".input-email").val() != "")
            labelInputEvent("email");
        if($(".input-pwf").val() != "")
            labelInputEvent("pwf");
        if($(".input-pws").val() != "")
            labelInputEvent("pws");
        if($(".input-filier").val() != "")
            labelInputEvent("filier");
        if($(".input-phone").val() != "")
            labelInputEvent("phone");
        if($(".input-gender").val() != "")
            labelInputEvent("gender");
        if($(".input-level").val() != "")
            labelInputEvent("level");
        if($(".input-CF").val() != "")
            labelInputEvent("CF");
        if($(".input-codecon").val() != "")
            labelInputEvent("codecon");
    }
    function InputEmpty(){
        if($(".input-l-name-active").val() == "" )
            labelInputEventR("l-name");
        if($(".input-f-name-active").val() == "")
            labelInputEventR("f-name");
        if($(".input-cin").val() == "")
            labelInputEventR("cin");
        if($(".input-user-name-active").val() == "")
            labelInputEventR("user-name");
        if($(".input-user-name-f-active").val() == "")
            labelInputEventR("user-name-f");
        if($(".input-email-active").val() == "")
            labelInputEventR("email");
        if($(".input-pwf-active").val() == "")
            labelInputEventR("pwf");
        if($(".input-pws-active").val() == "")
            labelInputEventR("pws");
        if($(".input-filier-active").val() == "")
            labelInputEventR("filier");
        if($(".input-phone-active").val() == "")
            labelInputEventR("phone");
        if($(".input-gender-active").val() == "")
            labelInputEventR("gender");
        if($(".input-level-active").val() == "")
            labelInputEventR("level");
        if($(".input-CF-active").val() == "")
            labelInputEventR("CF");
        if($(".input-codecon").val() == "")
            labelInputEventR("codecon");
    }
    setInterval(InputNotEmpty,100);
    setInterval(InputEmpty,50);
    function labelInputEvent(n){
            $(".label-"+n).addClass("label-"+n+"-active");
            $(".label-"+n+"-active").removeClass(".label-"+n);
            $(".input-"+n).addClass("input-"+n+"-active");
            $(".input-"+n+"-active").removeClass("input-"+n);
    }
    function labelInputEventR(n){
        $(".label-"+n+"-active").addClass(".label-"+n);
        $(".label-"+n).removeClass("label-"+n+"-active");
        $(".input-"+n+"-active").addClass("input-"+n);   
        $(".input-"+n).removeClass("input-"+n+"-active");
            
    }
    
    
//registre with ajax
   $('.registreU').click(function(e){
        e.preventDefault();var fd = new FormData();
        var files = $("#file")[0].files[0];
        fd.append('file',files);
        $.ajax({
            url : "../Control/UploadPicNewsUser.php",
            method : "post",
            data : fd,
            contentType : false,
            processData : false,
            success : function(e){
            }
        })
        var lname = $("#1").val();
        var fname = $("#2").val();
        var userName = $("#3").val();
        var email = $("#4").val();
        var pwf = $("#5").val();
        var pws = $("#6").val();
        var filier = $("#7").val();
        var phone = $("#8").val();
        var gender = $("#9").val();
        var level = $("#10").val();
        $.ajax({
            url : "../Control/RegistreControl.php",
            method : "post",
            data : {
                lname : lname,
                fname : fname,
                user : userName,
                email : email,
                password1 : pwf,
                password2 : pws,
                filier : filier,
                phone : phone,
                gender : gender,
                level : level
            },
            success : function(e){
                if(e == "nice"){
                    window.location = "/LIYS/home.php";
                }else{
                    alert(e);
                }
            }
        })
    })
   $(".registreF").click(function(e){
        e.preventDefault();
        var fd = new FormData();
        var files = $("#file")[0].files[0];
        fd.append('file',files);
        $.ajax({
            url : "../Control/UploadPicFormers.php",
            method : "post",
            data : fd,
            contentType : false,
            processData : false,
            success : function(e){
                
            }
        })
        var lname = $("#1").val();
        var fname = $("#2").val();
        var userName = $("#3").val();
        var email = $("#4").val();
        var pwf = $("#5").val();
        var pws = $("#6").val();
        var filier = $("#7").val();
        var phone = $("#8").val();
        var gender = $("#9").val();
        var centre = $("#10").val();
        var code = $("#11").val();
        var cin = $("#12").val();
        $.ajax({
            url : "../Control/RegistreFormersControl.php",
            method : "post",
            data : {
                lname : lname,
                fname : fname,
                cin : cin,
                user : userName,
                email : email,
                centre : centre,
                password1 : pwf,
                password2 : pws,
                filier : filier,
                phone : phone,
                gender : gender,
                code : code
            },
            success : function(e){
                if(e == "insert"){
                    window.location = "/LIYS/home.php";
                }else{
                    alert(e);
                }
            }
        })
        
        
   })
    
    
})