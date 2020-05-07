<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //
    public function login(){
      return view('admin.public.login');
    }

    //验证数据
    public function check(Request $request){
        //dd($request->all());
        $this->validate($request,[
            //验证规则 需要验证的字段名 =》 '验证规则1|验证规则2|'
            'username'=>'required|unique|min:2|max:20',
            'password'=>'required|unique|min:6|max|18',
            'captcha'=>'required|size:5|captcha',
        ]);
        //用户认证机制
        //auth   guard 可以进行快速身份认证
        $data = $request->only(['username','password']);
        $data['status']='2';//要求状态为启用的用户
        $result = Auth::guard('admin')->attempt($data,$request->get('online'));

        dd($result);

    }

    //

}
