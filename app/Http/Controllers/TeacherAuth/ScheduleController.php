<?php

namespace App\Http\Controllers\TeacherAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Schedule;
use App\ScheduleExam;

use App\Lesson;

class ScheduleController extends Controller
{
    public function exam()
    {
        $schedule = Auth::guard('teacher')->user()->room->schedule_exam;

        if(!$schedule)
        {
            return redirect()->back()->with('errorMessage', 'Anda tidak memiliki jadwal mengawas ujian');
        }
        
        return view('teacher.schedule.exam', [
            'schedule' => $schedule
        ]);
    }
        
    public function lesson()
    {
        $schedule = [];

        $teacher = Auth::guard('teacher')->user();
        $first_lesson = $teacher->lesson->first();

        if(!$first_lesson)
        {
            return redirect()->back()->with('errorMessage', 'Guru tersebut tidak memiliki Jadwal mengajar');
        }

        foreach($teacher->lesson as $lesson)
        {
            array_push($schedule, $lesson->schedule);
        }
        // if(count($schedule[0]))


        return view('teacher.schedule.lesson', [
            'schedule' => $schedule[0]
        ]);
    }
}
