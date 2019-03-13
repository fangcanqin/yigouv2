<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin_users extends Model
{
    //与模型关联用户数据表
    protected $table = 'admin_users';
    //禁止模型自动维护时间戳
    public $timestamps = false;
}
