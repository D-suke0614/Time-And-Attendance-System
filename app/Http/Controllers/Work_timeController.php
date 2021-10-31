<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;
// use Request;
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

            // 退勤が押されず、勤務開始が連続して押された時の処理
            $work_time = Work_time::where('user_id', $login_user_id)->latest('created_at')->first();
            if ($work_time === null) {
                Work_time::insert(array('start_time'=>Carbon::now(), 'created_at'=>Carbon::now(), 'user_id'=>$login_user_id));
            } elseif ($work_time->end_time === null) {
                return redirect('/check');
            } else {
                Work_time::insert(array('start_time'=>Carbon::now(), 'created_at'=>Carbon::now(), 'user_id'=>$login_user_id));
            }
            
        } elseif (Request::get('end')) {
            $work_time = Work_time::where('user_id', $login_user_id)->latest('created_at')->first();

            // 退勤が既に押されていた時の処理
            if ($work_time->end_time !== null) {
                return redirect('/stamp');
            }

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
        // 現在の時間を取得
        $now = Carbon::now();

        // 今月の値
        // dd($now->month);

        // 今年の値
        // dd($now->year);

        // 月初の日にちを取得
        $dt_from = new \Carbon\Carbon();
		$dt_from->startOfMonth();
        // dd($dt_from);

        // 月終わりの日にちを取得
		$dt_to = new \Carbon\Carbon();
		$dt_to->endOfMonth();
        // dd($dt_to);

        // start_timeが今月のデータを全て取得
        $times = Work_time::whereBetween('start_time', [$dt_from, $dt_to])->get();
        // dd($times);

        // ログインユーザーのidを取得
        $login_user_id = Auth::id();
        // dd($login_user_id);

        // ログインユーザーのデータを取得
        $user = User::where('id', $login_user_id)->first();
        
        return view('timeList', ['times'=>$times, 'user'=>$user, 'year'=>$now->year, 'month'=>$now->month]);
    }

    public function showPersonalTimeList($id)
    {
        $times = Work_time::where('user_id', $id)->get();
        // dd($times);
        $login_user_id = Auth::id();
        // dd($login_user_id);
        $user = User::where('id', $login_user_id)->first();
        // dd($user);
        return view('personalTimeList', ['times'=>$times, 'user'=>$user]);
    }

    public function search(Request $request)
    {
        // formから飛ばされた値を取得
        $year = $request->year;
        // dd($year);
        $month = $request->month;
        // dd($month);
        
        // formで検索された値から検索して値を取得
        $times = Work_time::whereyear('start_time', $year)->wheremonth('start_time', $month)->get();
        // dd($times);

        // ログインユーザーのidを取得
        $login_user_id = Auth::id();
        // dd($login_user_id);

        // ログインユーザーのデータを取得
        $user = User::where('id', $login_user_id)->first();
        
        return view('timeList', ['times'=>$times, 'user'=>$user, 'year'=>$year, 'month'=>$month]);
    }
}
