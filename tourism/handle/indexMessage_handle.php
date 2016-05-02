<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/16/2016
 * Time: 11:32 PM
 */

require_once "F:/Apache/htdocs/tourism/databases/sql_modle.php";

function places(){
    $sql = "select places_name,places_pic,places_desc from places";

    $new_search = new sql_model();
    $res = $new_search->sql_query($sql);
    return $res;
}
