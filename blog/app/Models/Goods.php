<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //于模型关联商品表
    protected $table = 'goods';
    //禁止自动维护时间字段
    public $timestamps = false;

    //商品对应商品组合
    public function goods_group()
    {
        return $this->hasMany('App\Models\Sku_details','gid');
    }

}
