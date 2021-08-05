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
            $all_time = gmdate('H:i:s', $time);
            // dd($all_time);
            $work_time = Work_time::where('user_id', $login_user_id)->latest('created_at')->first();
            $work_time->work_time = $all_time;
            $work_time->save();
        }
        return redirect('/stamp');


    }

    public function showTimeList()
    {
        $times = Work_time::all();
        // dd($times);
        // $login_user_id = Auth::id();
        // dd($login_user_id);
        $users = User::where('role', 0)->get();
        // dd($users);
        return view('timeList', ['times'=>$times, 'users'=>$users]);
    }

    public function showPersonalTimeList($id)
    {
        $times = Work_time::where('user_id', $id)->get();
        // dd($times);
        return view('personalTimeList', ['times'=>$times]);
    }
}
