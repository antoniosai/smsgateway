<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth::user();

        return view('admin.profile', [
            'data' => $data
        ]);
    }
    
    public function save(Request $request)
    {
        $user = Auth::user();
        
        if($request->input('password'))
        {
            if($request->input('password') != $request->input('password_confirmation'))
            {
                return redirect()->back();
            }

            $user->password = bcrypt($request->input('password'));
        }

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->name = $request->input('name');

        if($user->save())
        {
            return redirect()->back();
        }
    }
}
