<?php

namespace App\Http\Controllers\StudentAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Broadcast;

class AnnouncementController extends Controller
{
    public function index()
    {
        $broacast = Broadcast::where('category', 'student')->get();

        return view('student.announcement.index', [
            'broadcast' => $broacast
        ]);
    }
}
