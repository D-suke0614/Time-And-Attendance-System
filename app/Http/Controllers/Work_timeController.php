<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;
// use Request;
use Auth;
use App\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Work_timeController extends Controller
{
    //
    public function screen()
    {
        $user = Auth::id();
        $user = User::where('id', $user)->first();
        // dd($user->name);
        return view('stamp.stamp', ['user'=>$user]);
    }


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
        $times = Work_time::all();
        // dd($times);
        $login_user_id = Auth::id();
        $user = User::where('id', $login_user_id)->first();
        return view('timeList', ['times'=>$times, 'user'=>$user]);
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

    // 出勤時間編集
    function startModify($id)
    {
        $starttime_id = Work_time::find($id);
        return view('startTimeModify' ,['starttime_id'=>$starttime_id]);
    }

    function startUpdate(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Work_time::where('id',$id)->update(['start_time'=>$inputs['start_time']]);

        //idのデータ取り出し、end_time取り出し、start_time取り出し
        $time_data = Work_time::find($id);
        $end_time= $time_data->end_time;
        // dd($end_time);
        $start_time=$time_data->start_time;
        // dd($start_time);
        //worktimeを計算
        $start = strtotime($start_time);
        $end = strtotime($end_time);
        // dd($end - $start);
        $time = $end - $start;
        $all_time = gmdate('H:i:s', $time);
        Work_time::where('id',$id)->update(['work_time'=>$all_time]);
        $login_user_id = Auth::id();
        $message = '出勤時間の変更完了しました。';
        
        return redirect()->route('timelist.indexPersonal',[$login_user_id])->with('flash_message',$message );
    }

    //退勤時間修正
    function endModify($id)
    {
        $endtime_id = Work_time::find($id);
        
        return view('endTimeModify' ,['endtime_id'=>$endtime_id]);
    }

    function endUpdate(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Work_time::where('id',$id)->update(['end_time'=>$inputs['end_time']]);

        //idのデータ取り出し、end_time取り出し、start_time取り出し
        $time_data = Work_time::find($id);
        $end_time= $time_data->end_time;
        // dd($end_time);
        $start_time=$time_data->start_time;
        // dd($start_time);
        //worktimeを計算
        $start = strtotime($start_time);
        $end = strtotime($end_time);
        // dd($end - $start);
        $time = $end - $start;
        $all_time = gmdate('H:i:s', $time);
        Work_time::where('id',$id)->update(['work_time'=>$all_time]);
        $login_user_id = Auth::id();
        $message = '退勤時間の変更完了しました。';
        
        return redirect()->route('timelist.indexPersonal',[$login_user_id])->with('flash_message',$message );
    }
}