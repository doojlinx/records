<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iduration extends Model
{
    protected $guarded = [];

    public function investment()
    {
        return $this->hasMany(Investment::class);
    }
}
