<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function day()
    {
        return $this->belongsTo('App\Day');
    }

}
