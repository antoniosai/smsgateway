<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function teacher()
    {
        return $this->hasMany('App\Teacher');
    }
}
