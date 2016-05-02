<?php
/**
 * Created by PhpStorm.
 * User: H2 - PC
 * Date: 3/25/2016
 * Time: 4:28 PM
 */
/**
 *  实现图片验证码，并且存到session中
 **/

session_start();

$charCode = "";
//生成随机数字与字母
for($i=0; $i<4; $i++){
    $charCode .= dechex(rand(1,15));
}
$_SESSION["checkCode"] = $charCode;

//画背景图像
$img = imagecreatetruecolor(110,35);   //定义画布
$bgColor = imagecolorallocate($img,0,0,0);   //定义背景颜色
imagefill($img,0,0,$bgColor);          //将背景颜色填充到画布上

/**
 * bool imageline ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )
 * imageline() 用 color 颜色在图像 image 中从坐标 x1，y1 到 x2，y2（图像左上角为 0, 0）画一条线段。
*/
//利用imageline函数画出干扰线
for($i=0; $i<20; $i++){
    imageline($img,rand(0,110),rand(0,35),rand(0,110),rand(0,35),imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255) ) );
}

/**
 * bool imagestring ( resource $image , int $font , int $x , int $y , string $s , int $col )
 * imagestring() 用 col 颜色将字符串 s 画到 image 所代表的图像的 x，y 坐标处（这是字符串左上角坐标，整幅图像的左上角为 0，0）
 * 如果 font 是 1，2，3，4 或 5，则使用内置字体。
*/
//利用imagestring函数将随机出来的数值画到图片上去

imagestring($img,rand(2,5),rand(2,80),rand(2,10),$charCode,imagecolorallocate($img,255,255,255));

//输出生成好的图片即可
header("content-type: image/png");
imagepng($img);















