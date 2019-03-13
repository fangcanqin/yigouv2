<?php

function getAge($age){
    $bYear = date('Y',$age);
    $tYear = date('Y',time());
    //获取用户年龄
    $total = $tYear - $bYear;
    return $total;
}