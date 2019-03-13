<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //与模型关联用户数据表
    protected $table = 'users';
    //禁止模型自动维护时间戳
    public $timestamps = false;
}
