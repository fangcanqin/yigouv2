<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //于模型关联商品表
    protected $table = 'goods';
    //禁止自动维护时间字段
    public $timestamps = false;
}
