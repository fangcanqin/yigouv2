<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //与模型关联商品分类表
    protected $table = 'cates';
    //禁止自动维护时间戳
    public $timestamps = false;
}
