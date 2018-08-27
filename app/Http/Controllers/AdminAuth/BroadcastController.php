<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BroadcastController extends Controller
{
    public function index()
    {

        return view('admin.broadcast.index', [
            'query' => NULL,
        ]);
    }

    public function submit(Request $request)
    {

    }

    public function sendSMS($to, $message)
    {

    }
}
