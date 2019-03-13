<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    //与模型关联用户详情数据表
    protected $table = 'user_details';
    //禁止模型自动维护时间戳
    public $timestamps = false;
}
