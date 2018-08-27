<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Schedule;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();

        $schedule = new Schedule;
        $schedule->room_id = $request->input('room_id');
        $schedule->lesson_id = $request->input('lesson_id');
        $schedule->day_id = $request->input('day_id');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        
        if ($schedule->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menambahkan jadwal pelajaran');
            return redirect()->back();
        }
    }
    
    public function update(Request $request)
    {
        $id = $request->input('schedule_id');
        
        $schedule = Schedule::findOrFail($id);
        $schedule->room_id = $request->input('room_id');
        $schedule->day_id = $request->input('day_id');
        $schedule->lesson_id = $request->input('lesson_id');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');

        if ($schedule->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengupdate jadwal pelajaran');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $schedule = Schedule::findOrFail($id);

        if ($schedule->delete())
        {
            return redirect()->back()->with('successMessage', 'Berhasil menghapus jadwal pelajaran');
        }
    }
}
