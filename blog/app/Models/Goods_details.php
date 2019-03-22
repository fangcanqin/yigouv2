<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods_details extends Model
{
    //与模型关联商品参数表
    protected $table = 'goods_details';
    //禁止自动维护时间字段
    public $timestamps = false;
}
