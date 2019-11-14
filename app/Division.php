<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function schools()
    {
        return $this->hasMany('App\School','division_id');
    }
}
