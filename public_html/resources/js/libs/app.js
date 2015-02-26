$(document).ready(function () {


    $(window).resize(function () {
        var WindowWidth = $(window).width();
		
        if (WindowWidth > 480) {
            var Height = WindowWidth * .43;
            $(".bxslider-wrapper").css("height", Height + "px");
            $(".bxslider-wrapper ul li img").css("height", Height + "px");

        }
        else {        
            $(".bxslider-wrapper").css("height", "193px");
            $(".bxslider-wrapper ul li img").css("height", "193px");
        }
    });
    $(window).trigger("resize");

});