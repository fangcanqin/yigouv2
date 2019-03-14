<?php

/**
 * 获取当前年龄
 * 
 * @param  时间戳
 * @return 年龄
 */
function getAge($age){
    $bYear = date('Y',$age);
    $tYear = date('Y',time());
    //获取用户年龄
    $total = $tYear - $bYear;
    return $total;
}

/**
 * 判断文件后缀是否符合图片格式
 * 
 * @param 文件后缀
 * @return bool
 */
function getTypeImg($suffix){
    //设置图片格式
    $arr = ['img','png','jpeg','gif'];
    return in_array($suffix,$arr);
}