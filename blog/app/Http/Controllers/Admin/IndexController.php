<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin_users;
class IndexController extends Controller
{
    public function index()
    {
        //$mes = admin_users::where('name',session('userinfo'))->first();
    
        return view('admin.layout.index');
    }


    
}
