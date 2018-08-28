<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ScheduleExam as Schedule;

class ScheduleExamController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();

        $schedule = new Schedule;
        $schedule->room_id = $request->input('room_id');
        $schedule->lesson_id = $request->input('lesson_id');
        $schedule->date = $request->input('date');
        $schedule->start = $request->input('start');
        $schedule->teacher_id = $request->input('teacher_id');
        $schedule->end = $request->input('end');
        
        if ($schedule->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menambahkan jadwal ujian');
            return redirect()->back();
        }
    }
    
    public function update(Request $request)
    {
        $id = $request->input('schedule_id');
        
        $schedule = Schedule::findOrFail($id);
        $schedule->room_id = $request->input('room_id');
        $schedule->date = $request->input('date');
        $schedule->lesson_id = $request->input('lesson_id');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        $schedule->teacher_id = $request->input('teacher_id');

        if ($schedule->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengupdate jadwal ujian');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $schedule = Schedule::findOrFail($id);

        if ($schedule->delete())
        {
            return redirect()->back()->with('successMessage', 'Berhasil menghapus jadwal ujian');
        }
    }
}
