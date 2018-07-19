<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop__categories', function (Blueprint $table) {
//            字段名称	类型	备注
//id	primary	主键
            $table->increments('id');
//name	string	分类名称
            $table->string('name');
//img	string	分类图片
            $table->string('img')->nullable();
//status	int	状态：1显示，0隐藏
            $table->tinyInteger('status');


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
        Schema::dropIfExists('shop__categories');
    }
}