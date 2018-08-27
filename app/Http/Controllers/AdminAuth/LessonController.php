<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $data = Lesson::all();

        return view('admin.lesson.index', [
            'data' => $data
        ]);
    }

    public function filter_jadwal(Request $request)
    {
        $data = Lesson::findOrFail($request->lesson_id);
        $schedule = \App\Schedule::where([
            ['lesson_id', '=', $request->lesson_id],
            ['day_id', '=', $request->day_id],
        ])->get();

        return view('admin.lesson.detail', [
            'data' => $data,
            'schedule' => $schedule,
            'selected_day' => $request->day_id
        ]);
    }

    public function detail($id)
    {
        $data = Lesson::findOrFail($id);

        return view('admin.lesson.detail', [
            'schedule' => [],
            'data' => $data,
            'selected_day' => NULL
        ]);
    }

    public function add()
    {
        return view('admin.lesson.add');
    }

    public function add_student(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        $lesson = new Lesson;
        $lesson->name = $request->input('name');
        $lesson->teacher_id = $request->input('teacher_id');
        $lesson->description = $request->input('description');

        if ($lesson->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menambah ruang kelas');
            return redirect('/admin/lesson');
        }
    }

    public function edit($id)
    {
        $data = Lesson::findOrFail($id);

        return view('admin.lesson.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $lesson = Lesson::find($id);
        $lesson->name = $request->input('name');
        $lesson->teacher_id = $request->input('teacher_id');
        $lesson->description = $request->input('description');

        if ($lesson->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menngupdate ruang kelas');
            return redirect('/admin/lesson');
        }
    }

    public function delete($id)
    {
        $data = Lesson::findOrFail($id);

        if($data->delete())
        {
            return redirect('/admin/lesson')->with('successMessage', 'Berhasil menghapus Ruang Kelas');
        }
    }
}
