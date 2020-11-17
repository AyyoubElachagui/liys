$(document).ready(function(){
        var pic = "";
		var fd;
        var files;
        var test = 0;
	function ajaxRequest(urlPage,methodForm,dataRequest){
		$.ajax({
			url : urlPage,
			method : methodForm,
			data : dataRequest,
			datatype : "text",
			success : function(e){
				alert(e);
			}
		})
	}
	function ajaxResponse(urlPage,position){
		$.ajax({
			url : urlPage,
			datatype : "html",
			success : function(e){
                $(position).val("");
				$(position).html(e);
			}
		})
	}
	
    //load Info of User In home page 
    ajaxResponse("pages/Module/UserInfoHomeModule.php",".section-info-user");
    //load section bar search home page
    $(".inp-search").keyup(function(e){
    	e.preventDefault();
    	var data = $(this).val();
    	$.ajax({
			url : "pages/Control/SearchBarCourseControl.php",
			method : "POST",
			data : $('form').serialize(),
			datatype : "text",
			success : function(e){
				$(".section-course").html("");
				$(".section-course").html(e);
			}
		})
    })
    //load Response Invit 
    function ResponseInvit(){
    	ajaxResponse("pages/Module/NotificationUserModule.php",".section-notification-news");
    }
    setInterval(ResponseInvit,2000);
    //load All Courses 
    ajaxResponse("pages/Module/LoadCoursesModule.php",".section-course");
    //load section Chat a home page
    function FriendOnLine(){
    	ajaxResponse("pages/Module/FriendOnLineModule.php",".friends-online-slid");
    }
    setInterval(FriendOnLine,1000);
    //load section Chat a home page
    function LoadNews(){
    	ajaxResponse("pages/Module/NewsModule.php",".sectionSeeNews");
    }
    setInterval(LoadNews,300);
    function LoadNewsProfil(){
        ajaxResponse("pages/Module/NewsModuleProfil.php",".sectionSeeNewsProfil");
    }
    setInterval(LoadNewsProfil,300);
    //load knowledge friends
    function LoadFriends(){
        ajaxResponse("pages/Module/knowledgeFriendsModule.php",".section-friends");
    }
    setInterval(LoadFriends,300);
    //control add post
    $("#btnAddPost").click(function(e){
        fd = new FormData();
         files = $("#file")[0].files[0];
         
        fd.append('file',files);
        $.ajax({
            url : "pages/Control/UploadPicPostControl.php",
            method : "post",
            data : fd,
            contentType : false,
            processData : false,
            success : function(e){
            }
        })
            $.ajax({
            url : "pages/Control/AddPostControl.php",
            method : "post",
            data : $('form').serialize(),
            success : function(e){
                    alert(e);
                }
            })
    })
    
   //load all Formers
   ajaxResponse("pages/Module/knowledgeFormersModule.php",".section-formers");

    


})