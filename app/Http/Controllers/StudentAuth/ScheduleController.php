<?php

namespace App\Http\Controllers\StudentAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Schedule;
use App\ScheduleExam;

class ScheduleController extends Controller
{
    public function exam()
    {
        $schedule = Auth::guard('student')->user()->room->schedule_exam;
        // $schedule = ScheduleExam::all();
        
        return view('student.schedule.exam', [
            'schedule' => $schedule
            ]);
        }
        
    public function lesson()
    {
        $schedule = Auth::guard('student')->user()->room->schedule;

        return view('student.schedule.lesson', [
            'schedule' => $schedule
        ]);
    }
}
