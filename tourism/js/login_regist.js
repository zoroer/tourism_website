/**
 * Created by H2 - PC on 4/7/2016.
 */
$(function(){
    /*
    * 验证用户输入是否为空
    */
    $(".focus").bind({
        "input propertychange": function () {
            $(this).val().length < 1 ? $(this).next('p').slideDown(300) : $(this).next('p').slideUp(300);
        },
        "blur" : function(){
            if ($(this).val() == '') {
                $(this).next('p').slideDown(300);
            }
        }
    });

    function checkLoginFormNull(number){
        var login_username = $(".login_username").val();
        var login_password = $(".login_password").val();

        var regist_name = $(".rigist_username").val();
        var regist_mail = $(".rigist_mail").val();
        var regist_password = $(".rigist_password").val();
        var regist_confirmPassword = $(".rigist_confirmPassword").val();
        var regist_confirmNumber = $(".rigist_confirmNumber").val();

        if(number == 0) {
            if (checkNull(login_username)) {
                $(".login_username").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
            if (checkNull(login_password)) {
                $(".login_password").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
        }else if(number == 1) {
            if (checkNull(regist_name)) {
                $(".rigist_username").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
            if (checkNull(regist_mail)) {
                $(".rigist_mail").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
            if (checkNull(regist_password)) {
                $(".rigist_password").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
            if (checkNull(regist_confirmPassword)) {
                $(".rigist_confirmPassword").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
            if (checkNull(regist_confirmNumber)) {
                $(".rigist_confirmNumber").next("p").slideDown(300).delay(2000).slideUp(300);
                return false;
            }
        }
        return true;
    }

    function checkNull(value){
        if(value == null || value == "") return true;
    }


   //--------------------------------------- 登 录 --------------------------------------------------------//
    $(".login_btn").click(function(e){
        var login_username = $(".login_username").val();
        var login_pass = $(".login_password").val();

        if(!checkLoginFormNull(0)){
            e.preventDefault(); //验证不正确，禁止提交表单
        }else{
            $.ajax({
                type: "GET",
                url: "handle/login_handle.php",
                data:{
                    "username" : login_username,
                    "userpassword" : login_pass
                },
                success: function(data){
                    if(data == "queryOK"){
                        alert("登录成功,欢迎您  " + login_username);
                        $(".login_block").hide(); //登录框消失
                        $(".nav_logon").hide();
                        $(".nav_welcome").html("欢迎  "+ login_username).show();

                        saveLoginInfoToCookie(); //验证正确，存储数据到cookie中
                    } else if(data == -1){
                        $(".errorUp_message").html("用户名或密码错误").slideDown(300).delay(1000).slideUp(300);
                        setTimeout("window.location.reload()",1700);
                    }
                },
                error: function () {
                    error();
                }
            })
        }
    });

    //获取cookie，填充表单
    if ($.cookie("rem_btn") == "true") {
        $(".login_remember").prop("checked", true);
        $(".login_username").val($.cookie("rem_username"));
        $(".login_password").val($.cookie("rem_pass"));
    }

    function saveLoginInfoToCookie(){
        var rem_username = $(".login_username").val();
        var rem_pass = $(".login_password").val();

        if( $(".login_remember").prop("checked") == true ){
            $.cookie('rem_btn', 'true', {expires: 7});
            $.cookie('rem_username', rem_username, {expires: 7});
            $.cookie('rem_pass', rem_pass, {expires: 7});
        } else {
            $.cookie('rem_btn', 'false', {expires: -1});
            $.cookie('rem_username', "", {expires: -1});
            $.cookie('rem_pass', "", {expires: -1});
        }
    }

    //--------------------------------------- 注 册 --------------------------------------------------------//
    $(".regist_submit").click(function(e){
        var name = $(".rigist_username").val();
        var mail = $(".rigist_mail").val();
        var pass = $(".rigist_password").val();
        var passagain = $(".rigist_confirmPassword").val();
        var checkCode = $(".rigist_confirmNumber").val();

        if(!checkLoginFormNull(1)){
            e.preventDefault();
        }else if(pass != passagain){
            $(".errorUp_message").html("两次密码输入不一致!").slideDown(300).delay(2000).slideUp(300);
            e.preventDefault();
        }else if( !checkemail(mail) ){
            $(".errorUp_message").html("邮箱格式错误!").slideDown(300).delay(2000).slideUp(300);
            e.preventDefault();
        }else{
            $.ajax({
                type: "GET",
                url:"../handle/regist_handle.php",
                data:{
                    "username" : name,
                    "usermail" : mail,
                    "userpassword" : pass,
                    "checkCode" : checkCode
                },
                success: function(data){
                    if(data == -1){
                        $(".errorUp_message").html("验证码错误").slideDown(300).delay(1000).slideUp(300);
                        setTimeout("window.location.reload()",1700);
                    }else if(data == "OK"){
                        alert("账号注册成功,赶紧去登录吧!");
                        window.location.href="../index.php";
                    }else if(data == "multiple"){
                        $(".errorUp_message").html("用户名已被注册").slideDown(300).delay(1000).slideUp(300);
                        setTimeout("window.location.reload()",1700);
                    }
                },
                error: function () {
                    error();
                }
            })
        }
    });

    function checkemail(email){
        var pattern = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
        if(!pattern.test(email)) return false;
        else return true;
    }
});
