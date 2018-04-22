<?php
/*
// 创建一个 200X200 的图像
$img = imagecreatetruecolor(200, 200);
// 分配颜色
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
// 画一个黑色的圆
imagearc($img, 100, 100, 150, 150, 0, 360, $white);
// 将图像输出到浏览器
header("Content-type: image/png");
imagepng($img);
// 释放内存
imagedestroy($img);
*/
//header("Content-type: image/png");
//1.生成真彩图
$img = imagecreatetruecolor(200, 200); 
//2.上色
$color=imagecolorallocatealpha($img,0,0,0,127);
//3.设置透明
imagecolortransparent($img,$color);
imagefill($img,0,0,$color);
//4.向画布上写字
$textcolor=imagecolorallocate($img,255, 0, 0);
imagettftext($img, 50, 0, 10, 100, $textcolor, "/usr/share/fonts/chinese/TrueType/ukai.ttf", "萌萌的玉雪");
//5.保存Alpha通道
imagesavealpha($img,true);
//6.输出
imagepng($img);
//7.释放内存
imagedestroy($img);
alert("nonono");
?>