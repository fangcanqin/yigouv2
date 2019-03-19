<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //与模型关联订单详情表
    protected $table = 'orders';

    //禁止模型自动获取时间
    public $timestamps = false;
}
