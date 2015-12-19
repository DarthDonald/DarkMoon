var main=function(){
    $('.challeng').hover(function(){
        
        $(this).stop(true, true).animate({
            width: "40%",
            opacity : "1"
        }, '400').siblings().animate({
            width: "15%",
            opacity : "0.5"
        }, '400');
    });
};

$(document).ready(main);