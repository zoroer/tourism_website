<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/11/2016
 * Time: 4:29 PM
 */

require_once "sql_modle.php";
class login_deal{
    public function regist($name,$mail,$password){
        $sql1 = "select username from user where username= '$name'";  //查看是否用户名重复
        $sql2 = 'insert into USER VALUES (NULL,"'.$name.'","'.$mail.'","'.$password.'",1)';  //插入数据

        $new_sql = new sql_model();

        $returnVal = $new_sql->sql_query($sql1);
        if( empty($returnVal) ){
            $new_sql->process_sql($sql2);
        }else{
            return "multiple";
        }
        $new_sql->mysql_close();
    }

    public function login($name,$password){
        $sql = "select username,password from user where username= '$name' and password = '$password'";

        $new_sql = new sql_model();
        $res = $new_sql->sql_query($sql);

        if( !empty($res) ){
            return "query_ok";
        }

        $new_sql->mysql_close();
        return -1;
    }
}
