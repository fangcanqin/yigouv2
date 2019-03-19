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
/**
 * [CartesianProduct description]
 * @param [type] $sets [description]
 */
function CartesianProduct($sets){
 
 // 保存结果
 $result = array();
 
 // 循环遍历集合数据
 for($i=0,$count=count($sets); $i<$count-1; $i++){
 
 // 初始化
 if($i==0){
  $result = $sets[$i];
 }
 
 // 保存临时数据
 $tmp = array();
 
 // 结果与下一个集合计算笛卡尔积
 foreach($result as $res){
  foreach($sets[$i+1] as $set){
  $tmp[] = $res.$set;
  }
 }
 
 // 将笛卡尔积写入结果
 $result = $tmp;
 
 }
 
 return $result;
 
}