<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flink extends Model
{
    //与模型关联广告链接数据表
    protected $table = 'flink';

    //禁止模型自动维护时间戳
    public $timestamps = false;
}
