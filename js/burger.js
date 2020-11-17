$(document).ready(function(){
    $("#burger").click(function(e){
        e.preventDefault();
        $(".burger").toggleClass("burger-active");
        $(".p-line").toggleClass("p-line-active");
        $(".m-line").toggleClass("m-line-active");
        $(".d-line").toggleClass("d-line-active");
        $(".slidLeft-bar").toggleClass("slidLeft-bar-active");
        $(".slidBar-profil").toggleClass("slidBar-profil-active");
        $(".slidBar-all-courses").toggleClass("slidBar-all-courses-active");
        $(".slidBar-all-formers").toggleClass("slidBar-all-formers-active");
        $(".slidBar-all-massege").toggleClass("slidBar-all-massege-active");
        $(".slidBar-Setting").toggleClass("slidBar-Setting-active");
        $(".deconnecte").toggleClass("deconnecte-active");
    })
    
})