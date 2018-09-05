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

        $student = Auth::guard('student')->user();

        if($student->room_id == NULL)
        {
            return redirect()->back()->with('errorMessage', 'Belum memiliki kelas, silahkan hubungi Administrator');
        }

        $schedule = Auth::guard('student')->user()->room->schedule_exam;
        // $schedule = ScheduleExam::all();
        
        return view('student.schedule.exam', [
            'schedule' => $schedule
            ]);
        }
        
    public function lesson()
    {

        $student = Auth::guard('student')->user();

        if($student->room_id == NULL)
        {
            return redirect()->back()->with('errorMessage', 'Belum memiliki kelas, silahkan hubungi Administrator');
        }

        $schedule = Auth::guard('student')->user()->room->schedule;

        return view('student.schedule.lesson', [
            'schedule' => $schedule
        ]);
    }

    public function exam_filter(Request $request)
    {
        $where_clause = [
            'room_id' => Auth::guard('student')->user()->room_id
        ];

        $schedule = ScheduleExam::where($where_clause)->get();

        return view('student.schedule.exam', [
            'schedule' => $schedule
        ]);

    }

    public function lesson_filter(Request $request)
    {
        $where_clause = [
            'day_id' => $request->input('day_id'),
            'room_id' => Auth::guard('student')->user()->room_id
        ];

        $schedule = Schedule::where($where_clause)->get();

        return view('student.schedule.lesson', [
            'schedule' => $schedule
        ]);

    }
}
