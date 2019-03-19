<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    //与模型关联库存表
    protected $table = 'sku';
    //禁止自动维护时间字段
    public $timestamps = false;
}
