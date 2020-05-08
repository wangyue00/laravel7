<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
    //首页
    public function index(){

        //只要之前第一次使用auth的guard 那么后续都需要指定
        $admin = Auth::guard('admin')->user();
        return view('admin.index.index',compact('admin'));
    }

    //首页 - 框架页面
    public function welcome(){
       return view('admin.index.welcome');
    }


}
