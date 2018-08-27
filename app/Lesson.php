<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
