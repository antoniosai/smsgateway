<?php

namespace App\Http\Controllers\TeacherAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Broadcast;

class AnnouncementController extends Controller
{
    public function index()
    {
        $broacast = Broadcast::where('category', 'teacher')->get();

        return view('teacher.announcement.index', [
            'broadcast' => $broacast
        ]);
    }
}
