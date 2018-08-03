<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
//            字段名称	类型	备注
//id	primary	主键
            $table->increments('id');
//title	string	名称
            $table->string('title');
//content	text	详情
            $table->text('content');
//signup_start	int	报名开始时间
            $table->integer('signup_start');
//signup_end	int	报名结束时间
            $table->integer('signup_up');
//prize_date	date	开奖日期
            $table->date('prize_date');
//signup_num	int	报名人数限制
            $table->integer('signup_num');
//is_prize	int	是否已开奖
            $table->integer('is_prize');
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
        Schema::dropIfExists('events');
    }
}
