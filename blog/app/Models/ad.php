<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ad extends Model
{
    //与模型关联广告管理
    protected $table = 'ad';

    //禁止模型自动维护时间戳
    public $timestamps = false;
}
