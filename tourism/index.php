<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/6/2016
 * Time: 11:44 AM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Tourism Website</title>
    <link rel="icon" href="resources/img/b.ico">
    <link rel="stylesheet" type="text/css" href="resources/css/swiper/swiper.css">
    <link rel="stylesheet" type="text/css" href="style/tourism.css">
</head>

<body>
<header>
    <div class="nav">
        <div class="nav_left">
            <i class="nav_logo"></i>
            <ul>
                <li><a href="javascript:void(0)">发现</a></li>
                <li><a href="javascript:void(0)">达人</a></li>
<!--                <li><a href="javascript:void(0)">攻略</a></li>-->
                <li><a href="javascript:void(0)">结伴游</a></li>
                <li><a href="javascript:void(0)">论坛</a></li>
            </ul>
        </div>

        <div class="nav_right">
            <input type="text" class="nav_search" placeholder="Let's go" maxlength="15"/>
            <input type="text" class="nav_search_btn">

            <a href="login/signup.php" class="nav_logon">注 册</a>
            <a href="javascript:void(0)" class="nav_logon" id="nav_logon">登 录</a>
            <a href="javascript:void(0)" class="nav_welcome"></a>
        </div>
        <br clear="all">
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background: url('resources/img/nav2.jpg'); height: 480px;" onclick="location.assign('places/show_places.php?places_name=云南')">
                    <h1>魅力晚霞，快来一起耍啊,魅力晚霞，快来一起耍啊</h1>
                    <p>This is the test</p>
            </div>
            <div class="swiper-slide" style="background: url('resources/img/nav1.jpg') center center; height: 480px;" onclick="location.assign('places/show_places.php?places_name=湖南')">
                <h1>用真实经历告诉你，湘西为什么这么邪？</h1>
                <p>上刀梯 踏火海 定鸡定蛇 赶尸 放蛊 落洞 辰州符</p>
            </div>
            <div class="swiper-slide" style="background: url('resources/img/nav3.jpg') center center; height: 480px;" onclick="location.assign('places/show_places.php?places_name=西藏')">
                <h1>邂逅拉萨最柔情的男人 我的房东边次先生</h1>
                <p>旅途故事 拉萨旅居 光明甜茶馆 八廓街日落</p>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
</header>

<!--推荐模块-->
<div class="recommend_block_bg">
    <div class="recommend_block" style="padding-bottom: 0;">
        <section>
            <i>Recommended amazing places just for you</i>
            <p>看吧，世界正美，还要等你多久</p>
        </section>

        <ul style="margin: 40px auto;">
            <?php
                require_once "databases/sql_modle.php";
                $sql = "select places_name,places_pic,places_desc from places";
                $new_search = new sql_model();
                $res = $new_search->sql_query($sql);
                for($i=0; $i<sizeof($res); $i++){
            ?>
            <li>
                <div class="item" data-name="<?php echo $res[$i]["places_name"]?>">
                    <a><img src="<?php echo $res[$i]["places_pic"]?>" height="282" width="280"/></a>
                    <div class="item_desc">
                        <h5><?php echo $res[$i]["places_desc"]?></h5>
                        <p>
                            <i class="item_location_icon"></i><span class="item_location"><?php echo $res[$i]["places_name"]?></span>
                        </p>
                    </div>
                </div>
            </li >
            <?php } ?>
            <li class="recommend_more">
               <a href="javascript:void(0);"><i>更多<br>灵感之地<br>More >></i></a>
            </li>
            <br clear="all">
        </ul>
    </div>
    <br clear="all">
</div>
<div class="travelPartner_block_bg">
    <div class="travelPartner_block" style="padding-top: 0;">
        <section>
            <i>Just go,just go down to the road with no destination</i>
            <p>走，不是要去哪，而是在路上</p>
        </section>
        <div class="travelPartner">
            <div class="travelPartner_img">
                <a href="javascript:void(0);"><img src="resources/img/travelPartner/travelPartnerPic/daMo.jpg" height="443" width="790"/></a>
                <div class="img_block">大漠孤烟 湖波山色 丹霞地貌 文化历史</div>
            </div>
            <div class="travelPartner_desc">
                <p>梦回丝路飞扬大漠的青春寻踪之行</p>
                <i>大漠  结伴游  青春之旅</i>
                <div class="userMess">
                    <i class="user_pic"></i>
                    <span>发送邮件到632563570@qq.com<br>来参与吧</span><br>
                    <span style="margin-top: 35px; font-size: 12px;">2016年4月13日</span>
                    <br clear="all">
                </div>
                <button class="together">一起出发吧</button>
            </div>
            <br clear="all">
        </div>
    </div>
</div>
<div class="travelPartner_block_bg">
    <div class="travelPartner_block" style="padding-top: 0;">
        <section>
            <i>Join us and share your discoveries</i>
            <p>来吧，一个启发旅游灵感的网站</p>
        </section>
    </div>
</div>
<footer>
    <div class="foot_nav">
        <ul>
            <li><a href="javascript:void(0);">关于我们</a></li>
            <li><a href="javascript:void(0);">帮助</a></li>
            <li><a href="javascript:void(0);">友情链接</a></li>
            <li><a href="javascript:void(0);">管理员登录</a></li>
            <li><a href="javascript:void(0);">关注我们</a></li>
            <br clear="all">
        </ul>

        <div class="weChat">
            <i>用微信收藏灵感</i><br>
            <img src="resources/img/wechat(1).png" height="75" width="75" style="margin-top: 5px;"/>
        </div>
    </div>
    <div class="copyright">Copyright 2016-2017 17173. All rights reserved.</div>
</footer>

<!--login block-->
<div id="login_block" class="login_block">
    <div class="login_message">
        <i class="close"></i>
        <h4>登 录</h4>
        <div class="login_content">
            <p class="errorUp_message"></p>
            <form>
                <input type="text" class="login_username focus" placeholder="请输入用户名 (4-10位)" maxlength="16">
                <p class="error_message" style="margin:2px 0 -10px 43px;">用户名不能为空</p>
                <input type="password" class="login_password focus" placeholder="请输入密码 (6-16位)" maxlength="16">
                <p class="error_message" style="margin:2px 0 -10px 43px;">密码不能为空</p> <br>
                <input type="checkbox" class="login_remember"><span style="color:#999; font-size: 12px; margin-left: -100px;">记住密码</span>
                <a class="login_forget_password">忘记密码?</a>
                <button type="button" class="login_btn">立即登录</button>
            </form>
        </div>
        <p class="jump_regist">还没有账号？<a href="login/signup.php">立即注册吧!</a></p>
    </div>
</div>

<!--------------------------------------------- Javascript source---------------------------------------------->
<script type="text/javascript" src="resources/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="resources/js/swiper.min.js"></script>
<script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/login_regist.js"></script>
<script>
    //swiper 插件选项
    var mySwiper = new Swiper('.swiper-container', {
        autoplay:4000,
        pagination : '.swiper-pagination',
        paginationClickable :true,
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next',
        grabCursor:true,
        centeredSlides:true,
        slidesPerView: 'auto'
    });
</script>
</body>
</html>
