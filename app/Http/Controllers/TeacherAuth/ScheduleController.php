<?php

namespace App\Http\Controllers\TeacherAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Schedule;
use App\ScheduleExam;

class ScheduleController extends Controller
{
    public function exam()
    {
        $schedule = Auth::guard('teacher')->user()->room->schedule_exam;
        // $schedule = ScheduleExam::all();
        
        return view('teacher.schedule.exam', [
            'schedule' => $schedule
        ]);
    }
        
    public function lesson()
    {
        $schedule = Schedule::where('teacher_id', Auth::guard('teacher')->user()->id);

        return view('teacher.schedule.lesson', [
            'schedule' => $schedule
        ]);
    }
}
