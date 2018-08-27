<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SendSMS;

use App\Schedule;
use App\Broadcast;

class SMSController extends Controller
{
    public function schedule_reminder()
    {
        $today = date('D');

        $indonesian_day = [
            'Sun' => 1,
            'Mon' => 2,
            'Tues' => 3,
            'Wed' => 4,
            'Thurs' => 5,
            'Fri' => 6,
            'Sat' => 7,
        ];

        $schedule = Schedule::where('day_id', $indonesian_day[$today])->get();
        // $schedule = Schedule::all();

        $hari = \App\Day::findOrFail($indonesian_day[$today]);

        //Looping the Schedule

        $message_predicate = [
            'student' => 'Belajar',
            'teacher' => 'Mengajar'
        ];
        $name = 'Antonio';

        $lessons_for_student = [];
        $message_for_student = [];
        $message_for_teacher = [];

        foreach($schedule as $jadwal)
        {

            // $lessons_for_student = array_push($lessons_for_student, $jadwal->lesson->name); 

            array_push($lessons_for_student, $jadwal->lesson);
            foreach($jadwal->room->student as $student)
            {
                $msg = 'Selemat Pagi '.$student->name.', Jadwal ' . $message_predicate['student'] . ' pada hari ' . $hari->name . ' tanggal ' . date('d M Y') . ' adalah ';
                
                
                $msg .= $jadwal->lesson->name . ' pada jam ' . $jadwal->start . ' sampai ' . $jadwal->end . ' oleh Guru ' . $jadwal->lesson->teacher->name;
                
                $data = [
                    'student_name' => $student->name,
                    'student_phone' => $student->phone,
                    'message' => $msg
                ];
                array_push($message_for_student, $data);
                // echo $message_for_student;
            }

            //Message for Teacher
            $msg_for_teacher = 'Selemat Pagi '.$jadwal->lesson->teacher->name.', Jadwal ' . $message_predicate['teacher'] . ' Anda pada hari ' . $hari->name . ' tanggal ' . date('d M Y') . ' adalah ';
            $msg_for_teacher .= $jadwal->lesson->name . ' pada jam ' . $jadwal->start . ' sampai ' . $jadwal->end . ' di Kelas ' . $jadwal->room->name;

            $data_teacher = [
                'teacher_name' => $jadwal->lesson->teacher->name,
                'teacher_phone' => $jadwal->lesson->teacher->phone,
                'message' => $msg_for_teacher
            ];

            array_push($message_for_teacher, $data_teacher);
            
        }

        //Looping for Sending SMS for Student
        for($i = 0; $i < count($message_for_student); $i++)
        {
            //Execute Gammu Command for Sending a SMS
            $process = exec('sudo gammu sendsms TEXT '.$message_for_student[$i]['student_phone'].' -text "'.$message_for_student[$i]['message'].'"');

            if(!$process)
            {

                $broadcast = new Broadcast;
                $broadcast->name = 'Pemberitahuan Jadwal Belajar Hari ' . $hari->name . ' tanggal ' . date('d-M-Y') . ' untuk Siswa ' . $message_for_student[$i]['student_name'] . ' ('.$message_for_student[$i]['student_phone'].')';
                $broadcast->destination = $message_for_student[$i]['student_phone'];
                $broadcast->message = $message = $this->addSignatureMessage($message_for_student[$i]['message']);
                if($broadcast->save())
                {
                    unset($broadcast);
                }
            }
        }
        
        //Looping for Sending SMS for Teacher
        for($y = 0; $y < count($message_for_teacher); $y++)
        {
            $process = exec('sudo gammu sendsms TEXT '.$message_for_teacher[$y]['teacher_phone'].' -text "'.$message_for_teacher[$y]['message'].'"');


            if(!$process)
            {

                $broadcast = new Broadcast;
                $broadcast->name = 'Pemberitahuan Jadwal Mengajar pada Hari ' . $hari->name . ' tanggal ' . date('d-M-Y') . ' untuk Guru ' . $message_for_teacher[$y]['teacher_name'] . ' ('.$message_for_teacher[$y]['teacher_phone'].')';
                $broadcast->destination = $message_for_teacher[$y]['teacher_phone'];
                $broadcast->message = $message = $this->addSignatureMessage($message_for_teacher[$y]['message']);
                if($broadcast->save())
                {
                    unset($broadcast);
                }
            }
        }

    }

    protected function addSignatureMessage($message)
    {

        return $message . '
        
        Jangan membalas Pesan Ini';
    }
}