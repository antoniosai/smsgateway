<?php

namespace App\Http\Controllers\TeacherAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Parents as Wali;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth::guard('teacher')->user();

        return view('teacher.profile', [
            'data' => $data
        ]);
    }
    
    public function save(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();


        $teacher->nis = $request->input('nis');
        $teacher->email = $request->input('email');
        $teacher->name = $request->input('name');
        $teacher->address = $request->input('address');
        $teacher->phone = $request->input('phone');
        $teacher->birthplace = $request->input('birthplace');
        $teacher->birthdate = $request->input('birthdate');
        $teacher->gender_id = $request->input('gender_id');
        $teacher->religion_id = $request->input('religion_id');
        // $teacher->room_id = $request->input('room_id');

        if($parents)
        {
            $teacher->parents_id = $parents->id;
        }

        if($request->input('password'))
        {
            if($request->input('password') != $request->input('password_confirmation'))
            {
                return redirect()->back();
            }
            
            $teacher->password = bcrypt($request->input('password'));
        }
        
        if($teacher->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengedit Siswa');
            return redirect()->back();
        }
    }
}
