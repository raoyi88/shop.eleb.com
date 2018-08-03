<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OrderGoods;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    //订单列表
    public function index(){
       $orders=Order::all();
       foreach ($orders as $order){
           $id=$order->id;
       }
        $status=['-1'=>"已取消",'0'=>"待发货",'1'=>"待确认",'2'=>"待确认",'3'=>"完成"];
        $order->status=$status[$order->status];
        $goods=OrderGoods::where('order_id',$id)->get();
        $address=$order->province."省".$order->city."市".$order->county."县（区）".$order->address;
       return view('order.index',compact('orders','address'));
    }
    //订单详情
    public function show(Order $order){
       // -1:,0:待支付,1:待发货,2:待确认,3:完成
        $goods=OrderGoods::where('order_id',$order->id)->get();
        $address=$order->province."省".$order->city."市".$order->county."县（区）".$order->address;
        return view('order.show',compact('order','goods','address'));
    }
    //订单状态修改
    public function edit(Order $order){
        $order->update([
            'status'=>2
        ]);
        return redirect(route('order.index'));
    }
    public function destroy(Order $order){
        $order->delete();
        return redirect(route('order.index'));
    }
    public function CountOrder(Request $request)
    {
       // dd($request->id);
        //订单数量
        $user = User::where('id',auth()->user()->id)->first();
        $orders = Order::where('shop_id',$user->shop_id)->get();
        //dd($orders);
        $day_count = 0;
        $month_count = 0;
        $total_count = 0;
        $month = 0;
        $day = 0;
        foreach ($orders as $order){
            $total_count ++;
            if (substr($order->created_at,0,7) == substr(date('Y-m',time()),0,7)){
                $month_count ++;
                if (substr($order->created_at,0,10) == substr(date('Y-m-d',time()),0,10)){
                    $day_count ++;
                }
            }
            //按指定月份查询
            if (substr($order->created_at,0,7) == substr($request->month,0,7)){
                $month ++;
            }
            //按指定日期查询
            if (substr($order->created_at,0,10) == substr($request->day,0,10)){
                $day ++;
            }
        }
        $month_date = $request->month;
        $day_date = $request->day;
//        dd($day_date);
     // echo'1';

        return view('order/CountOrder',compact('day_count','month_count','total_count','month','day','month_date','day_date'));
    }

}
