<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_time extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
        // Userモデルに従属する
    }
    protected $dates = [
        'start_time',
        'end_time'
    ];
}
