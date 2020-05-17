<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    //管理员列表
    public function index(){
        //查询数据
        //Select t1.*,t2.auth_name as parent_name from auth as t1 left join auth as t2 on t1.pid = t2.id
        $data = Auth::from('auth as t1')
            ->leftjoin('auth as t2','t1.pid','t2.id')
            ->select('t1.*','t2.auth_name as parent_name')
            ->get();


        return view('admin.auth.index',compact('data'));
    }

    //管理员的添加
    public function add(Request $request){
        //展示页面

        //添加功能的实现
        if($request->isMethod('post')){
           //dd($request->all());
           $this->validate($request,[
               'auth_name'=>'required|min:4|max:16',
               'pid'=>'required',
               'is_nav'=>'required'
           ],[
               'auth_name.required'=>'权限名称是必填项',
               'auth_name.min'=>'权限名称最少4字',
               'auth_name.max'=>'权限名称最多为16个字',
               'pid.required'=>'上级权限是必填项',
               'is_nav.required'=>'是否在菜单显示是必选项'
           ]);

            //处理数据
            $data = $request->except('_token');
            //由于框架自身不支持响应bool值，所以转为数字
            $result=Auth::insert($data);
            //返回结果
            return $result ?'1':0 ;
        }
            //查询父级权限

            $parents = Auth::where(['pid'=>0])->get();
            return view('admin.auth.add',compact('parents'));

    }

}
