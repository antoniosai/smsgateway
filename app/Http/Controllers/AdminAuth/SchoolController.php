<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Info;

class SchoolController extends Controller
{
    public function save(Request $request)
    {
        $info = Info::first();
        $info->name = $request->input('name');
        $info->address = $request->input('address');
        $info->email = $request->input('email');
        $info->phone = $request->input('phone');

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $info->logo = $file->getClientOriginalName();

            $destinationPath = 'uploads/logo';
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        if($info->save())
        {
            $request->session()->flash('alert-success', 'Berhasil mengupdate identitas sekolah');
            return redirect()->back();
        }
    }
}
