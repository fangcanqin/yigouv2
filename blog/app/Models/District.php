<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //与模型关联城市表
    protected $table = 'district';
    //禁止模型自动维护时间戳
    public $timestamps = false;
}
