<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parents';

    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
