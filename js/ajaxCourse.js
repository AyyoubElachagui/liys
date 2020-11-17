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
				$(position).html(e);
			}
		})
	}
	
    //load Info of User In home page 
    ajaxResponse("../Module/UserInfoCourseModule.php",".section-info-user");
   
    //load Response Invit 
    function ResponseInvit(){
    	ajaxResponse("../Module/NotificationUserCourseModule.php",".section-notification-news");
    }
    setInterval(ResponseInvit,2000);
   ///////
    function FriendOnLine(){
        ajaxResponse("../Module/FriendOnLineCourseModule.php",".friends-online-slid");
    }
    setInterval(FriendOnLine,1000);
    


})