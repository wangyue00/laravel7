<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    //管理员列表
    public function index(){
        return view('admin.auth.index');
    }

    //管理员的添加
    public function add(Request $request){
        //展示页面

        //添加功能的实现
        if($request->isMethod('post')){
           $this->validate($request,[
               
           ]);

        }

            return view('admin.auth.add');

    }

}
