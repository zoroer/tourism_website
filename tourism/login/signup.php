<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/6/2016
 * Time: 6:16 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login_signup</title>
    <link rel="icon" href="../resources/img/b.ico">
    <link rel="stylesheet" type="text/css" href="../style/tourism.css">
</head>
<body>
<div class="regist_bg">
    <div class="regist_box">
        <div class="regist_title">
            <a href="../index.php"><i class="nav_logo" style="margin: 10px 0 0 130px;"></i></a>
            <h6>一起来吧,走出属于你的旅程</h6>
        </div>
        <div class="regist_content">
            <p class="errorUp_message"></p>
            <form>
                <input type="text" class="rigist_username focus" placeholder="请输入用户名 (4-10位)" maxlength="10">
                <p class="error_message">用户名不能为空</p>

                <input type="text" class="rigist_mail focus" placeholder="请输入邮箱" maxlength="25">
                <p class="error_message">邮箱不能为空</p>

                <input type="text" class="rigist_password focus" placeholder="请输入密码 (6-16位)"  maxlength="16">
                <p class="error_message">密码不能为空</p>

                <input type="text" class="rigist_confirmPassword focus" placeholder="请再次输入密码" maxlength="16">
                <p class="error_message">请再次输入密码</p>

                <input type="text" class="rigist_confirmNumber focus" placeholder="请输入验证码" style="width:110px;" maxlength="4">
                <img src="../handle/verification_code_handle.php" class="rigist_confirmNumber" style="cursor:pointer; position: relative; top: 12px; left: 23px;" onclick="this.src='../handle/verification_code_handle.php?a='+Math.random();" />
                <p class="error_message">验证码不能为空</p>

                <button class="regist_submit" type="button">完成注册</button>
            </form>
        </div>
    </div>
</div>

<!----------------------------------------------Js 资源------------------------------------------------------------------>
<script type="text/javascript" src="../resources/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../resources/js/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/login_regist.js"></script>

</body>
</html>


