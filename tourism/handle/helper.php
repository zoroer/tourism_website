<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/10/2016
 * Time: 9:32 PM
 */

function checkImgCode($regest_checkCode){
    session_start();  //开启session 获取图片验证码
    if($regest_checkCode != $_SESSION["checkCode"]) {
        echo -1;
        exit();
    }
}