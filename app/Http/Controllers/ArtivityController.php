<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ArtivityController extends Controller
{
    public function index(){
        $time=time();
        $activities=Activity::where('end_time','>',$time)->get();
        return view('artivity.index',compact('activities'));
    }
}
