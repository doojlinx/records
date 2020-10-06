<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Istatus extends Model
{
    protected $guarded = [];

    public function investment()
    {
        return $this->hasMany(Investment::class);
    }
}
