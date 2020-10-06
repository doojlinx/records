<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Iplan;

class Investment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo('App\Iplan', 'iplan_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Istatus', 'istatus_id');
    }
    public function duration()
    {
        return $this->belongsTo('App\Iduration', 'iduration_id');
    }

    public function file()
    {
        return $this->belongsTo('App\File', 'file_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }
}
