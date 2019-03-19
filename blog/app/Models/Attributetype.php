<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attributetype extends Model
{
    //与模型关联商品属性表
    protected $table = 'attributetype';
    //禁止自动维护时间字段
    public $timestamps = false;
}
