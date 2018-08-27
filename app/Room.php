<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function leader()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
    
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }    
    
}
