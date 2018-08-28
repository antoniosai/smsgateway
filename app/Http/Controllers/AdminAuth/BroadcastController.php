<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Broadcast;

class BroadcastController extends Controller
{
    public function index()
    {
        $data = DB::table('broadcasts')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.broadcast.index', [
            'data' => $data,
            'query' => NULL,
        ]);
    }

    public function add()
    {
        return view('admin.broadcast.add');
    }

    public function submit(Request $request)
    {

    }

    public function sendSMS($to, $message)
    {

    }

    public function send_message(Request $request)
    {

        $tujuan = $request->input('tujuan');

        //Jika tujuan Siswa;
        if($tujuan == 'students')
        {
            $student = \App\Student::all();

            foreach($student as $siswa)
            {
                $broadcast = new \App\Broadcast;
                $broadcast->name = 'Pengumuman Tanggal ' . date('d M Y');
                $broadcast->destination = $siswa->phone;
                $broadcast->message = $request->input('message');
                if($broadcast->save())
                {
                    unset($broadcast);
                }
            }

            return 'Pesan untuk siswa berhasil terkirim';
        }
        
        if($tujuan == 'parents')
        {
            $student = \App\Student::all();
            
            foreach($student as $siswa)
            {
                if($siswa->wali)
                {
                    if($siswa->wali->phone && $siswa->wali->name){
                        $broadcast = new \App\Broadcast;
                        $broadcast->name = 'Pengumuman Tanggal ' . date('d M Y');
                        $broadcast->destination = $siswa->wali->phone;
                        $broadcast->message = $request->input('message');
                        if($broadcast->save())
                        {
                            unset($broadcast);
                        }
                    }
                }
            }
            return 'Pesan untuk wali berhasil terkirim';
        }

        if($tujuan == 'teachers')
        {
            $teacher = \App\Teacher::all();

            foreach($teacher as $guru)
            {
                $broadcast = new \App\Broadcast;
                $broadcast->name = 'Pengumuman Tanggal ' . date('d M Y');
                $broadcast->destination = $guru->phone;
                $broadcast->message = $request->input('message');
                if($broadcast->save())
                {
                    unset($broadcast);
                }
            }
            return 'Pesan untuk Guru berhasil terkirim';

        }
    }
}
