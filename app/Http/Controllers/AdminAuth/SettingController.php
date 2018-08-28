<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Info;

class SettingController extends Controller
{
    public function tahun_ajaran(Request $request)
    {
        $info = Info::first();
        $info->active_year = $request->input('active_year');
        $info->active_semester = $request->input('active_semester');

        if($info->save())
        {
            return redirect()->back();
        }
    }
}
