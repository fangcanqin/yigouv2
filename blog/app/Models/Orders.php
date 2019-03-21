<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    
    protected $table = 'orders';
    // 表明模型是否应该被打上时间戳
    public $timestamps = false;
    
    /**
     * 获得与用户关联的电话记录。
     */
    public function address()
    {
        return $this->hasOne('App\Models\Address','user_id');
    }
}
