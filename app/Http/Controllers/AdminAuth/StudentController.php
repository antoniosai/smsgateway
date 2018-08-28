<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use App\Parents as Wali;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::paginate(20);

        return view('admin.student.index', [
            'query' => NULL,
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $gender_id = $request->input('gender_id');
        $religion_id = $request->input('religion_id');

        $data = Student::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('nis', 'LIKE', '%'.$search.'%')
        ->where('gender_id', $gender_id)
        ->where('religion_id', $religion_id)
        ->paginate(10);

        return view('admin.student.index', [
            'query' => $request,
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Student::findOrFail($id);

        return view('admin.student.detail', [
            'data' => $data
        ]);
    }

    public function add()
    {
        return view('admin.student.add');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $parents = new Wali;
        $parents->name = $request->input('parent_name');
        $parents->birthplace = $request->input('parent_birthplace');
        $parents->birthdate = $request->input('birthdate');
        $parents->phone = $request->input('parent_phone');
        $parents->job = $request->input('parent_job');
        $parents->save();

        $student = new Student;
        $student->nis = $request->input('nis');
        $student->email = $request->input('email');
        $student->username = $request->input('nis');
        $student->password = bcrypt($request->input('nis'));
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone = $request->input('phone');
        $student->birthplace = $request->input('birthplace');
        $student->birthdate = $request->input('birthdate');
        $student->gender_id = $request->input('gender_id');
        $student->religion_id = $request->input('religion_id');
        $student->room_id = $request->input('room_id');

        if($parents)
        {
            $student->parents_id = $parents->id;
        }

        if($student->save())
        {
            $request->session()->flash('alert-success', 'Berhasil menambahkan Siswa baru');
            return redirect('admin/student');
        }
    }

    public function edit($id)
    {
        $data = Student::findOrFail($id);

        return view('admin.student.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        // return $request->all();

        $parents = new Wali;
        $parents->name = $request->input('parent_name');
        $parents->birthplace = $request->input('parent_birthplace');
        $parents->birthdate = $request->input('birthdate');
        $parents->phone = $request->input('parent_phone');
        $parents->job = $request->input('parent_job');
        $parents->save();

        $id = $request->input('id');

        $student = Student::findOrFail($id);
        $student->nis = $request->input('nis');
        $student->email = $request->input('email');
        $student->username = $request->input('nis');
        $student->password = bcrypt($request->input('nis'));
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone = $request->input('phone');
        $student->birthplace = $request->input('birthplace');
        $student->birthdate = $request->input('birthdate');
        $student->gender_id = $request->input('gender_id');
        $student->religion_id = $request->input('religion_id');
        $student->room_id = $request->input('room_id');

        if($parents)
        {
            $student->parents_id = $parents->id;
        }

        if($student->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengedit Siswa');
            return redirect('admin/student');
        }
    }

    public function delete($id)
    {
        $data = Student::findOrFail($id);

        if($data->delete())
        {
            return redirect()->back();
        }
    }
}
