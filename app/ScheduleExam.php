<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleExam extends Model
{
    protected $table = 'schedule_exam';

    protected $fillable = ['room_id', 'teacher_id', 'lesson_id','date', 'start', 'end'];

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
