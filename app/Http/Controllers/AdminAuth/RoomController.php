<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Room;

class RoomController extends Controller
{
    public function index()
    {
        $data = Room::all();

        return view('admin.room.index', [
            'data' => $data
        ]);
    }

    public function filter_jadwal(Request $request)
    {
        $data = Room::findOrFail($request->room_id);

        $where_clause = [];

        if($request->day_id)
        {
            $where_clause = [
                ['room_id', '=', $request->room_id],
                ['day_id', '=', $request->day_id],
            ];
        }
        else
        {
            $where_clause = [
                ['room_id', '=', $request->room_id],
            ];
        }

        // return $where_clause;

        $schedule = \App\Schedule::where($where_clause)->get();

        $schedule_exam = \App\ScheduleExam::where('room_id', $request->room_id)->get();


        return view('admin.room.detail', [
            'data' => $data,
            'schedule' => $schedule,
            'schedule_exam' => $schedule_exam,
            'selected_day' => $request->day_id
        ]);
    }

    public function detail($id)
    {
        $data = Room::findOrFail($id);

        $schedule = \App\Schedule::where('room_id', $id)->get();
        $schedule_exam = \App\ScheduleExam::where('room_id', $id)->get();

        return view('admin.room.detail', [
            'schedule' => $schedule,
            'schedule_exam' => $schedule_exam,
            'data' => $data,
            'selected_day' => NULL
        ]);
    }

    public function add()
    {
        return view('admin.room.add');
    }

    public function add_student(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        $room = new Room;
        $room->name = $request->input('name');
        $room->teacher_id = $request->input('teacher_id');
        $room->student_id = $request->input('student_id');

        if ($room->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menambah ruang kelas');
            return redirect('/admin/room');
        }
    }

    public function edit($id)
    {
        $data = Room::findOrFail($id);

        return view('admin.room.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $room = Room::find($id);
        $room->name = $request->input('name');
        $room->teacher_id = $request->input('teacher_id');
        $room->student_id = $request->input('student_id');

        if ($room->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menngupdate ruang kelas');
            return redirect('/admin/room');
        }
    }

    public function delete($id)
    {
        $data = Room::findOrFail($id);

        if($data->delete())
        {
            return redirect('/admin/room')->with('successMessage', 'Berhasil menghapus Ruang Kelas');
        }
    }
}
