<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/27
 * Time: 15:50
 * 验证码类
 */
namespace yzm;
class CheckCode
{
    const  LENGTH = 4;   //验证码长度
    public $resCode = '';
    public $showCode = '';
    //生成4个验证码随机数（字母数字组合）
    public function createStr()
    {
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i=0;$i<self::LENGTH;$i++) {
            $code = $str{mt_rand(0,61)};
            $this->resCode .= $code;
            $this->showCode .= $code." ";
        }
    }

    //验证码图形输出
    public function output($filename = 'yzm.png')
    {
        $this->createStr();
        $img = imagecreate(80,20);
        $color = imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
        $white = imagecolorallocate($img,rand(0,50),rand(0,50),rand(0,50));
        for ($i=0;$i<50;$i++) {
            $randcolor = imagecolorallocate($img,rand(100,255),rand(100,255),rand(100,255));
            imagesetpixel($img,rand(0,80),rand(0,20),$randcolor);
        }
        imagestring($img,5,10,0,$this->showCode,$white);
        imagepng($img,$filename);
        imagedestroy($img);
        return $this->resCode;
    }
}
