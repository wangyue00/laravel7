<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;


class ManagerController extends Controller
{
    /*
     * 显示用户指定属性
     * @param int $id
     * @return Response
     *
     * */
    public function index(){
        $manager=Manager::get();
        //dd($manager);
        return view('admin.manager.index',compact('manager'));
    }
}
