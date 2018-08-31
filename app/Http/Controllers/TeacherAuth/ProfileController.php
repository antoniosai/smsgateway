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
        $student = Auth::guard('teacher')->user();

        $parents = new Wali;
        $parents->name = $request->input('parent_name');
        $parents->birthplace = $request->input('parent_birthplace');
        $parents->birthdate = $request->input('birthdate');
        $parents->phone = $request->input('parent_phone');
        $parents->job = $request->input('parent_job');
        $parents->save();


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
        // $student->room_id = $request->input('room_id');

        if($parents)
        {
            $student->parents_id = $parents->id;
        }

        if($request->input('password'))
        {
            if($request->input('password') != $request->input('password_confirmation'))
            {
                return redirect()->back();
            }
            
            $user->password = bcrypt($request->input('password'));
        }
        
        if($student->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengedit Siswa');
            return redirect()->back();
        }
    }
}
