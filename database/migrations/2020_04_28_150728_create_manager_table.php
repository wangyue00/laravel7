<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建对应表方法
        Schema::create('manager', function (Blueprint $table) {
            //设计字段
            $table->increments('id');//主键字段
            $table->string('username',20)->nullable(false);//用户名，不能为空
            $table->string('password')->nullable(false);//密码 varchar(255)，不能为空
            $table->enum('gender',[1,2,3])->nullable(false)->default('1');//性别枚举字段 默认是1
            $table->string('mobile',11);//手机号，
            $table->string('email',40);//邮箱
            $table->tinyInteger('role_id');//角色表id
            $table->timestamps();//create_at update_at(系统自带)
            $table->string('remember_token','100');
            $table->enum('status',[1,2])->nullable(false)->default('2');//1禁用 2 启用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除对应表方法
        Schema::dropIfExists('manager');
    }
}
