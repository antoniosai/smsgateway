<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $data = Teacher::paginate(20);

        return view('admin.teacher.index', [
            'query' => NULL,
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $data = Teacher::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('nip', 'LIKE', '%'.$search.'%')
        ->paginate(10);

        return view('admin.teacher.index', [
            'query' => $request,
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Teacher::findOrFail($id);

        return view('admin.teacher.detail', [
            'data' => $data
        ]);
    }

    public function add()
    {
        return view('admin.teacher.add');
    }

    public function store(Request $request)
    {
        // return $request->all();

        $teacher = new Teacher;
        $teacher->nip = $request->input('nip');
        $teacher->email = $request->input('email');
        $teacher->username = $request->input('nip');
        $teacher->password = bcrypt($request->input('nip'));
        $teacher->name = $request->input('name');
        $teacher->address = $request->input('address');
        $teacher->phone = $request->input('phone');
        $teacher->birthplace = $request->input('birthplace');
        $teacher->birthdate = $request->input('birthdate');
        $teacher->gender_id = $request->input('gender_id');
        $teacher->religion_id = $request->input('religion_id');

        if($teacher->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menambahkan Siswa baru');
            return redirect('admin/teacher');
        }
    }

    public function edit($id)
    {
        $data = Teacher::findOrFail($id);

        return view('admin.teacher.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        // return $request->all();

        $id = $request->input('id');

        $teacher = Teacher::findOrFail($id);
        $teacher->nip = $request->input('nip');
        $teacher->email = $request->input('email');
        $teacher->username = $request->input('nip');
        $teacher->password = bcrypt($request->input('nip'));
        $teacher->name = $request->input('name');
        $teacher->address = $request->input('address');
        $teacher->phone = $request->input('phone');
        $teacher->birthplace = $request->input('birthplace');
        $teacher->birthdate = $request->input('birthdate');
        $teacher->gender_id = $request->input('gender_id');
        $teacher->religion_id = $request->input('religion_id');

        if($teacher->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengedit Siswa');
            return redirect('admin/teacher');
        }
    }

    public function delete($id)
    {
        $data = Teacher::findOrFail($id);

        if($data->delete())
        {
            return redirect()->back();
        }
    }
}
