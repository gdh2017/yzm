<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/27
 * Time: 16:25
 */

require_once "../vendor/autoload.php";
$obj = new yzm\CheckCode();
//echo $obj->createStr();   //

//返回验证码值，并在相应目录生成图片验证码
echo "验证码值：".$obj->output()."<br/>";
echo "验证码图片：<img src='yzm.png'/>";
