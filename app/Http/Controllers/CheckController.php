<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Work_time;
use Carbon\Carbon;
use Request;
use Auth;

class CheckController extends Controller
{
    //
    public function store(Request $request)
    {
        $login_user_id = Auth::id();
        if (Request::get('start')) {
            Work_time::insert(array('start_time'=>Carbon::now(), 'created_at'=>Carbon::now(), 'user_id'=>$login_user_id));
            return redirect('/stamp');
        }

        return redirect('/stamp');
    }
}
