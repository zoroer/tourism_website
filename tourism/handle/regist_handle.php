<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/10/2016
 * Time: 18:48 PM
 */
error_reporting(0);
require_once "helper.php";
require_once "../databases/regist_sql.php";

$regest_username = $_GET["username"];
$regest_mail = $_GET["usermail"];
$regest_password = $_GET["userpassword"];
$regest_checkCode = $_GET["checkCode"];

checkImgCode($regest_checkCode);
$new_login = new login_deal();
$isMultiple = $new_login->regist($regest_username,$regest_mail,$regest_password);

if($isMultiple == "multiple"){
    echo "multiple";
}




