$(document).ready(function(){
    
   
    $(".btn-add-post").click(function(e){
        e.preventDefault();
        $(".section-add-post").toggleClass("section-add-post-active");
    });
    $("#iconSearch").click(function(e){
        e.preventDefault();
        $(".icon-search").toggleClass("icon-search-active");
        $(".inp-search").toggleClass("inp-search-active");
    });
    $(".icon-notification").click(function(e){
        e.preventDefault();
        $(".flish-notification").toggleClass("flish-notification-active");
        $(".section-notification-news").toggleClass("section-notification-news-active");
    });
    $(".div-icon-chat").click(function(e){
        e.preventDefault();
        $(".friends-online-slid").toggleClass("friends-online-slid-active");
    });


    //Log Out
   $('.deconnecteBTN').click(function(e){
    e.preventDefault();
    $.ajax({
        url : "pages/Control/logOutControl.php",
        success : function(e){
            if(e == "nice")
                window.location = "index.php";
        }
    })
   })
    
})