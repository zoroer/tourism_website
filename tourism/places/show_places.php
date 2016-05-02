<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/17/2016
 * Time: 12:25 PM
 */

require_once "../databases/sql_modle.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Tourism Website</title>
    <link rel="icon" href="../resources/img/b.ico">
    <link rel="stylesheet" type="text/css" href="../resources/css/swiper/swiper.css">
    <link rel="stylesheet" type="text/css" href="../style/tourism.css">
</head>

<body>
<header>
    <?php include "../common file/header_nav.php";?>
</header>

<?php
    $get_cityName = $_GET["places_name"];
    $sql = "select places_pic,places_detailedDesc from places where places_name = '$get_cityName' ";
    $new_search = new sql_model();
    $res = $new_search->sql_query($sql);
?>
<div class="bannerWrap">
    <div class="bannerWrapMain">
        <span><?php echo $get_cityName?></span>
        <i class="bannerWrap_location"></i>
    </div>
</div>
<div class="placeMain_nav">
    <ul>
        <li class="active"><a href="javascript:void(0);">必知</a></li>
        <li><a href="javascript:void(0);">玩法</a></li>
        <li><a href="javascript:void(0);">景区</a></li>
        <li><a href="javascript:void(0);">游记</a></li>
    </ul>
</div>

<div class="content">
    <div class="content_left">
        <div class="content_left_cityDesc">
            <img src="../<?php echo $res[0]["places_pic"]?>" height="304" width="472">
            <div class="city_desc">
                <h5>综述</h5><div class="squ"></div>
                <p><?php echo $res[0]["places_detailedDesc"]?></p>
            </div>
            <br clear="all"/>
        </div>
        <div class="content_left_title"><p>热门城市</p></div>
        <div class="popular_city">
            <ul>
                <?php
                    require_once "../databases/sql_modle.php";
                    $sql = "select city_name,city_picture from cities where province_name='$get_cityName'";
                    $new_search = new sql_model();
                    $res1 = $new_search->sql_query($sql);
                    for($i=0; $i<sizeof($res1); $i++){
                ?>
                <li>
                    <a><img src="<?php echo $res1[$i]["city_picture"]?>" height="144" width="224"/></a>
                    <p class="city_pic"><?php echo $res1[$i]["city_name"]?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="content_left_title"><p>热门景区</p></div>
        <div class="popular_scenery">
            <ul>
                <?php
                $sql = "select scenery_name,scenery_picture from scenery where province_name='$get_cityName'";
                $new_search = new sql_model();
                $res2 = $new_search->sql_query($sql);
                for($i=0; $i<sizeof($res2); $i++){
                ?>
                <li>
                    <a><img src="<?php echo $res2[$i]["scenery_picture"]?>" height="144" width="224"/></a>
                    <p class="city_pic"><?php echo $res2[$i]["scenery_name"]?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="content_right">
            <div class="content_right_title">节庆</div>
            <div class="festival_desc">
                <?php
                    $sql = "select festival_name,festival_time from festival where province_name='$get_cityName' ";
                    $new_search = new sql_model();
                    $res3 = $new_search->sql_query($sql);
                    for($i=0; $i<sizeof($res3); $i++){
                ?>
                <a style="cursor: pointer;">
                    <i class="dot"></i>
                    <span><?php echo $res3[$i]["festival_name"] ?></span>
                    <p><?php echo "时间：".$res3[$i]["festival_time"] ?></p>
                </a>
                <?php } ?>
            </div>
    </div>
    <br clear="all">
</div>
<div class="recommend">
    <h2>— 国内游目的地推荐 —</h2>
    <ul>
        <li>北京</li>
        <li>哈尔滨</li>
        <li>大连</li>
        <li>三亚</li>
        <li>丽江</li>
        <li>南京</li>
        <li>杭州</li>
        <li>重庆</li>
        <li>成都</li>
        <li>扬州</li>
        <li>上海</li>
        <li>厦门</li>
        <li>秦皇岛</li>
        <li>苏州</li>
        <li>上饶</li>
        <li>乐山</li>
        <li>天津</li>
        <li>黄山</li>
        <li>广州</li>
        <li>温州</li>
        <li>杭州</li>
        <li>西安</li>
        <li>洛阳</li>
        <li>承德</li>
        <li>青岛</li>
        <li>威海</li>
        <li>济南</li>
        <li>北海</li>
        <li>长沙</li>
        <li>大理</li>
        <li>贵阳</li>
        <li>桂林</li>
        <li>海口</li>
    </ul>
    <br clear="all">
</div>
<footer>
    <?php include "../common file/footer_white.php";?>
</footer>

<!--------------------------------------------- Javascript source---------------------------------------------->
<script type="text/javascript" src="../resources/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../resources/js/swiper.min.js"></script>
<script type="text/javascript" src="../js/show_places.js"></script>
</body>
</html>
