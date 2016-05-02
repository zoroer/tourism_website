/**
 * Created by H2 - PC on 4/17/2016.
 */

$(function(){
    $(".placeMain_nav ul").find("li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    });
});