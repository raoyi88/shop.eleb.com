<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];
    public function getname(){
        return $this->hasOne(Member::class,'id','user_id');
    }
    public function getgoods(){
        return $this->hasOne(OrderGoods::class,'order_id','id');
    }
}
