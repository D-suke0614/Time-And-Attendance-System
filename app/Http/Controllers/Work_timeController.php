<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;

class Work_timeController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request);
        $work_time = new Work_time;
        // $work_time->start_time = '2021-07-17 22:22:00';
        // $work_time->end_time = '2021-07-17 22:22:00';
        // $work_time -> work_time = $request->time;
        // $work_time->status = 'active';
        // $work_time->user_id = 6;

        // $work_time->save();

        Work_time::insert(array('start_time'=>Carbon::now(), 'user_id'=>6));
        // Work_time::insert(array('end_time'=>Carbon::now(), 'user_id'=>1));

        //リダイレクト処理
        // return redirect()->route('/stamp');
        return redirect('/stamp');
    }

    public function update(Request $request, $id)
    {
        $work_time = Work_time::find(31);
        $work_time -> end_time = Carbon::now();
    }
}
