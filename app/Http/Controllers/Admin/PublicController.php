<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PublicController extends Controller
{
    //
    public function login(){
        $a='adad';
        $b='adadad';
        /*$a=substr_count($b,$a);*/
        $a1=[];

        //将规则字符串分割并转为数组
        for($i=0;$i<strlen($a);$i++){
            $a1[]=$a[$i];
        }
        //判断规则字符串是否有重复的内容
        $res=array_unique($a1);
        //将规则数组转成字符串
        $preg = implode($res);
        //判断在匹配字符串中是否存在规则字符串



      /*return view('admin.public.login');*/
    }

    //验证数据
    public function check(Request $request){
        //dd($request->all());.

        $this->validate($request,[
            //验证规则 需要验证的字段名 =》 '验证规则1|验证规则2|'
            'username'=>'required|min:2|max:20',
            'password'=>'required|min:6|max:18',
            'captcha'=>'required|size:5|captcha',
        ]);

        //用户认证机制
        //auth   guard 可以进行快速身份认证
        $data = $request->only(['username','password']);
        $data['status']='2';//要求状态为启用的用户
        $result = Auth::guard('admin')->attempt($data,$request->get('online'));

        if($result){
            //跳转到后台页面
            return redirect('/admin/index/index');
        }else{
            return redirect('/admin/public/login')->withErrors(['loginError'=>'用户名或密码错误']);
        }

    }

    //首页退出
    public function logout(){
        //退出
        Auth::guard('admin')->logout();
        return redirect(route('admin.public.login'));
    }

}
