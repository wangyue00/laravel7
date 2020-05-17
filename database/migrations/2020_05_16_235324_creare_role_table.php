<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreareRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建对应表方法
        Schema::create('role', function (Blueprint $table) {
            //设计字段
            $table->increments('id');//主键字段
            $table->text('auth_ids');//权限id集合
            $table->string('auth_ac');//权限控制器和方法组合字符串
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
        Schema::dropIfExists('role');
    }
}
