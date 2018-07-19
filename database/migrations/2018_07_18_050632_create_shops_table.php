<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
//            商家信息表shops
//字段名称	类型	备注
//id	primary	主键
            $table->increments('id');
//shop_category_id	int	店铺分类
            $table->integer('shop_category_id');
//shop_name	string	名称
            $table->string('shop_name');
//shop_img	string	店铺图片
            $table->string('shop_img');
//shop_rating	float	评分
            $table->float('shop_rating');
//brand	boolean	是否是品牌
            $table->boolean('brand');
//on_time	boolean	是否准时送达
            $table->boolean('on_time');
//fengniao	boolean	是否蜂鸟配送
            $table->boolean('fengniao');
//bao	boolean	是否保标记
            $table->boolean('bao');
//piao	boolean	是否票标记
            $table->boolean('piao');
//zhun	boolean	是否准标记
            $table->boolean('zhun');
//start_send	float	起送金额
            $table->float('start_send');
//send_cost	float	配送费
            $table->float('send_cost');
//notice	string	店公告
            $table->string('notice');
//discount	string	优惠信息
            $table->string('discount');
//status	int	状态
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
        Schema::dropIfExists('shops');
    }
}
