<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function investment()
    {
        return $this->hasOne(Investment::class);
    }
}
