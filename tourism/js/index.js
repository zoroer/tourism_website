$(function(){
    //js滚动事件
    $(window).scroll(function(){
        if( $(document).scrollTop() > 0 && $(".nav_logon").css("display") == "block" ){
            $(".nav").addClass("nav_change");
            $(".nav_right").css("margin-right","-8%");
        }else{
            $(".nav").removeClass("nav_change");
            $(".nav_right").css("margin-right","8%");
        }
    });

    //login登录框出现事件
    $("#nav_logon").click(function(){
        $(".login_block").show();
    });
    $(".close").click(function(){
        $(".login_block").hide();
        $(".error_message").hide();//清空错误信息
    });

    //主页旅游地区跳转
    $(".item").click(function(){
        location.assign("places/show_places.php?places_name="+$(this).data("name"));
    });
});