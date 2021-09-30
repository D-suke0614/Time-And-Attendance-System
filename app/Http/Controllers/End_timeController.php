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
        $work_time = new Work_time;
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
    }
}
