<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model implements Authenticatable
{
    //定义当前模型所需要关联的数据表
    protected $table = 'manager';
    //使用tract 就相当于将整个tract 代码段复制到这个位置

     //引入trait
    use \Illuminate\Auth\Authenticatable ;
    //关联模型
    public function role(){
        return $this->hasOne('App\Admin\Role','id','role_id');
    }

}
