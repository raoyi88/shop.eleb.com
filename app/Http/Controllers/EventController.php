<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventMember;
use App\Models\EventPrize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(){
        $events=Event::where('is_prize',0)->get();
        return view('event.index',compact('events'));
    }
    public function show(Event $event){
        $id=$event->id;
        $userid=Auth::id();
        $member=EventMember::where(['member_id'=>$userid,'events_id'=>$event->id])->first();
        $prize=EventPrize::where('events_id',$id)->first();
        return view('event.show',compact('event','prize','member'));
    }
    public function baoming(Event $event){
        $events_id=EventMember::where('events_id',$event->id)->get();
        dd($events_id);
        $id=Auth::id();
        $eventid=$event->id;
        EventMember::create([
            'events_id'=>$eventid,
            'member_id'=>$id
        ]);
        session()->flash('success',"报名成功！");
        return redirect(route('event.index'));
    }
}
