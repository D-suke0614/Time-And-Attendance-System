<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;
use Request;

class Work_timeController extends Controller
{
    //
    public function store(Request $request)
    {
        if (Request::get('start')) {
            $work_time = new Work_time;
            Work_time::insert(array('start_time'=>Carbon::now(), 'user_id'=>6));
        } elseif (Request::get('end')) {
            $work_time = Work_time::find(206);
            $end_time = Carbon::now();
            $work_time->end_time = $end_time;
            $work_time->save();
        }
        return redirect('/stamp');
        
        
    }
}
