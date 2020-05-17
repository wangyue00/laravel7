<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) {
            $table->increments('id');//主键ID
            $table->string('auth_name',20)->nullable(false);//权限名称
            $table->string('controller',40);//权限对应的控制器
            $table->string('action',30);//权限对应的一个方法
            $table->tinyInteger('pid');//当前权限的父级id
            $table->enum('is_nav',[1,2])->nullable(false)->default(1);//是否作为菜单展示
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth');
    }
}
