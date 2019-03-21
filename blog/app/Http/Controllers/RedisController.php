<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedisController extends Controller
{
    public function testRedis()
    {
        $res = $redis->lpush('list-1','测试');
        
    }
}
