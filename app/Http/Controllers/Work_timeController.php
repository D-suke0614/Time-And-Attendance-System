<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;
use Request;
use Auth;
use App\User;

class Work_timeController extends Controller
{
    //
    public function store(Request $request)
    {
        $login_user_id = Auth::id();
        // dd($login_user_id);

        if (Request::get('start')) {
            $work_time = new Work_time;
            Work_time::insert(array('start_time'=>Carbon::now(), 'created_at'=>Carbon::now(), 'user_id'=>$login_user_id));
        } elseif (Request::get('end')) {
            $work_time = Work_time::where('user_id', $login_user_id)->latest('created_at')->first();
            // dd($work_time);
            $end_time = Carbon::now();
            $work_time->end_time = $end_time;
            $work_time->save();


            // 開始時間と終了時間の差分
            $start_time = $work_time->start_time;
            $start = strtotime($start_time);
            $end = strtotime($end_time);
            // dd($end - $start);

            $time = $end - $start;
            $hours = round( $time / 3600);
            $hour = intval($hours);
            $minutes = floor( ( $time / 60 ) % 60 );
            $seconds = $time % 60;
            dd($hours, $minutes, $seconds);
        }
        return redirect('/stamp');


    }
}