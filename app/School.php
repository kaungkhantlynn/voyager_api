<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    protected $appends = ['division_name'];
    protected $hidden = ['division_id'];
    
    public function scopeFindSchool($query,$id){
       return $query->where('id',$id)->first();
    }

    public function division(){
        return $this->belongsTo('App\Division','division_id');
    }

    public function getDivisionNameAttribute()
    {
        return $this->attributes['division_name'] = $this->division->name;
    }
}
