<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //与模型匹配购物车模型
    protected $table = 'cart';
    //禁止自动维护时间字段
    public $timestamps = false;
}
