<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 4/11/2016
 * Time: 4:12 PM
 */

class sql_model{
    public $conn;
    public $host = "localhost";
    public $sql_user = "root";
    public $sql_password = "";
    public $dateBase_name = "tourism_websit";

    public function __construct(){
        $this->conn = mysqli_connect($this->host,$this->sql_user,$this->sql_password);

        if(!$this->conn){
            die("连接失败".mysqli_connect_error());
        }
        mysqli_select_db($this->conn,$this->dateBase_name);
    }

    public function sql_query($sql){
        $arr = array();
        $res = mysqli_query($this->conn,$sql) or die(mysqli_connect_error());

        while($row = mysqli_fetch_array($res)){
            $arr[] = $row;
        }
        mysqli_free_result($res);
        return $arr;
    }

    public function process_sql($sql){
        mysqli_query($this->conn,$sql) or die(mysqli_connect_error());
        echo "OK";
    }

    public function mysql_close(){
        if(empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }
}
