<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slid extends Model
{
    //与模型关联的轮播图数据表
    protected $table = 'slid';
    //禁止自动维护时间戳
    public $timestamps = false;
    
}
