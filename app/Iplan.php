<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Investment;

class Iplan extends Model
{
    protected $guarded = [];

    public function investment()
    {
        return $this->hasMany(Investment::class);
    }
}
