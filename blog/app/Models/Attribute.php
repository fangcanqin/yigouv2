<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //与模型关联商品属性表
    protected $table = 'attribute';
    //禁止自动维护时间字段
    public $timestamps = false;

    //规格对应属性
    public function Attributes()
    {
        return $this->hasMany('App\Models\Attributetype','attr_id')->select('id','attr_id');
    }
}
