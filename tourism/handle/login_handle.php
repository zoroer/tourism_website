<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/11/2016
 * Time: 6:38 PM
 */

require_once "../databases/regist_sql.php";

$login_username = $_GET["username"];
$login_password = $_GET["userpassword"];

$new_login = new login_deal();
$returnValue =  $new_login->login($login_username,$login_password);

if($returnValue == "query_ok"){
    echo "queryOK";
}else if($returnValue == -1){
    echo -1;
}