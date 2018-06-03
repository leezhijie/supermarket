<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-8
 * Time: 下午7:42
 */

namespace App\Http\Controllers;


class CommonController extends Controller{
    //重定向页面
    public static function redirect($location){
        //Header("Location: ".$location);
        echo "<script language=\"javascript\">
        location.href=\"$location\"
        </script>";
        exit;
    }

    //警告，弹出对话框并返回上一页
    public static function alert($info){
        echo "<script language=\"javascript\">
        alert(\"$info\");
        </script>";
    }

    //返回页面
    public static function goBack(){
        echo "<script language=javascript type =text/javascript >";
        echo "history.go(-1)";
        echo "</script>";
    }

    //弹出对话框
    public static function popup($info){
        echo "<script language=\"javascript\">alert(\"$info\"); </script>";
    }

}