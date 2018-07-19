<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
//            字段名称	类型	备注
//id	primary	主键
            $table->increments('id');
//name	string	名称
            $table->string('name');
//email	email	邮箱
            $table->string('email');
//password	string	密码
            $table->string('password');
//rememberToken	string	token
            $table->string('rememberToken');
//status	int	状态：1启用，0禁用
            $table->tinyInteger('status');
//shop_id	int	所属商家
            $table->tinyInteger('shop_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
