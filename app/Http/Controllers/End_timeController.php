<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;

class End_timeController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($end_time);
        $work_time = new Work_time;
        // $work_time->start_time = '2021-07-17 22:22:00';
        // $work_time->end_time = '2021-07-17 22:22:00';
        // $work_time -> work_time = $request->time;
        // $work_time->status = 'active';
        // $work_time->user_id = 6;

        // $work_time->save();

        Work_time::insert(array('start_time'=>Carbon::now(), 'end_time'=>Carbon::now(), 'user_id'=>1));

        //リダイレクト処理
        return redirect('/stamp');
    }

    public function update(Request $request, $id)
    {
        $end_time = Carbon::now();
        $work_time = Work_time::find(17);
        $work_time -> end_time = $end_time;
        return redirect('/stamp');
        // $id = Work_time::where('id')

        // DB::update('update Work_times');
    }
}
