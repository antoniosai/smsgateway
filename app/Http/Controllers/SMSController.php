<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SendSMS;

use App\Schedule;
use App\Broadcast;
use App\Day;
use App\Student;
use App\Teacher;

class SMSController extends Controller
{

    public function reminder()
    {

        // return exec('whoami', );
        // exec("gammu-smsd-inject TEXT 08121494007 -text 'Test test test'", $output, $return_var);

        
        $now = date('D');

        $indonesian_day = [
            'Mon' => 1,
            'Tue' => 2,
            'Wed' => 3,
            'Thu' => 4,
            'Fri' => 5,
            'Sat' => 6,
        ];

        $today = Day::findOrFail($indonesian_day[$now]);

        $message_predicate = [
            'student' => 'Belajar',
            'teacher' => 'Mengajar'
        ];

        $student = Student::all();
        $teacher = Teacher::all();

        // return $student->room->schedule->where('day_id', 4);

        $message_for_student = [];
        $message_for_teacher = [];
        $message_for_parent = [];

        foreach($student as $siswa)
        {
            $msg = 'Pemberitahuan, Kepada :  '.$siswa->name.', Jadwal ' . $message_predicate['student'] . ' pada hari ' . $today->name . ' adalah ';
            $matpel = '';

            $data_parent  = [];    
            
            $msg_for_parent = '';


            foreach($siswa->room->schedule->where('day_id', $today->id) as $schedule)
            {
                
                $matpel .= $schedule->lesson->name . ', ';
                if($siswa->wali->phone && $siswa->wali->name){
                    $msg_for_parent = 'Pemberitahuan, Kepada :  '.$siswa->wali->name.', schedule ' . $message_predicate['student'] . ' anak Anda '. $siswa->name .' pada hari ' . $today->name . ' tanggal ' . date('d M Y') . ' adalah ';
                    // $msg_for_parent .= $schedule->lesson->name . ' pada jam ' . $schedule->start . ' sampai ' . $schedule->end . ' oleh Guru ' . $schedule->lesson->teacher->name;

                    $data_parent = [
                        'name' => $siswa->wali->name,
                        'phone' => $siswa->wali->phone,
                        'message' => $msg_for_parent
                    ];
                }
                
                // $newarraynama=substr($matpel, 0, -1);
            }
            $matpel = substr($matpel, 0, -2);
            $msg .= $matpel;
            $msg_for_parent .= $matpel;

            $data_parent['message'] = $msg_for_parent;
            
            $data_student = [
                'name' => $siswa->name,
                'phone' => $siswa->phone,
                'message' => $msg
            ];
            
            array_push($message_for_student, $data_student);
            // array_push($message_for_student, $msg);
            array_push($message_for_parent, $data_parent);
        }

        // return $message_for_parent;
        
        foreach($teacher as $guru)
        {
            
            $data_teacher = [];
            
            $msg = 'Pemberitahuan, Kepada :  '.$guru->name.', Jadwal ' . $message_predicate['teacher'] . ' pada hari ' . $today->name . ' adalah ';
            $string = '';
            
            foreach($guru->lesson as $matpel)
            {
                $string .= $matpel->name . ', ';
                // $newarraynama=substr($string, 0, -1);
            }
            $string = substr($string, 0, -2);
            $msg .= $string;
            
            $data_teacher = [
                'name' => $guru->name,
                'phone' => $guru->phone,
                'message' => $msg
            ];
            
            array_push($message_for_teacher, $data_teacher);
        }
        
        // return count($message_for_teacher);
        for($y = 0; $y < count($message_for_teacher); $y++)
        {
            $process = exec('gammu-smsd-inject TEXT '.$message_for_teacher[$y]['phone'].' -text "'.$message_for_teacher[$y]['message'].'"');
            // return 'gammu-smsd-inject TEXT '.$message_for_teacher[$y]['phone'].' -text "'.$message_for_teacher[$y]['message'].'"';
            $broadcast = new Broadcast;
            $broadcast->name = 'Pemberitahuan Jadwal Mengajar pada Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Guru ' . $message_for_teacher[$y]['name'] . ' ('.$message_for_teacher[$y]['phone'].')';
            $broadcast->destination = $message_for_teacher[$y]['phone'];
            $broadcast->message = $message = $this->addSignatureMessage($message_for_teacher[$y]['message']);
            if($broadcast->save())
            {
                unset($broadcast);
            }
        }

        //Looping for Sending SMS for Student
        for($i = 0; $i < count($message_for_student); $i++)
        {
            //Execute Gammu Command for Sending a SMS
            $process = exec('gammu-smsd-inject TEXT '.$message_for_student[$i]['phone'].' -text "'.$message_for_student[$i]['message'].'"');

            $broadcast = new Broadcast;
            $broadcast->name = 'Pemberitahuan Jadwal Belajar Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Siswa ' . $message_for_student[$i]['name'] . ' ('.$message_for_student[$i]['phone'].')';
            $broadcast->destination = $message_for_student[$i]['phone'];
            $broadcast->message = $message = $this->addSignatureMessage($message_for_student[$i]['message']);
            if($broadcast->save())
            {
                unset($broadcast);
            }
        }


        //Looping for Sending SMS for Parent
        for($x = 0; $x < count($message_for_parent); $x++)
        {
            //Execute Gammu Command for Sending a SMS
            $process = exec('gammu-smsd-inject TEXT '.$message_for_parent[$x]['phone'].' -text "'.$message_for_parent[$x]['message'].'"');

            $broadcast = new Broadcast;
            $broadcast->name = 'Pemberitahuan Jadwal Belajar Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Siswa ' . $message_for_parent[$x]['name'] . ' ('.$message_for_parent[$x]['phone'].')';
            $broadcast->destination = $message_for_parent[$x]['phone'];
            $broadcast->message = $message = $this->addSignatureMessage($message_for_parent[$x]['message']);
            if($broadcast->save())
            {
                unset($broadcast);
            }
        }
        

        

    }


    public function schedule_reminder()
    {
        $today = date('D');

        $indonesian_day = [
            'Mon' => 1,
            'Tue' => 2,
            'Wed' => 3,
            'Thurs' => 4,
            'Fri' => 5,
            'Sat' => 6,
        ];

        // return $indonesian_day[$today];

        $schedule = Schedule::where('day_id', $indonesian_day[$today])->get();
        // $schedule = Schedule::all();

        $today = Day::findOrFail($indonesian_day[$today]);

        //Looping the Schedule

        $message_predicate = [
            'student' => 'Belajar',
            'teacher' => 'Mengajar'
        ];

        $lessons_for_student = [];
        $message_for_student = [];
        $message_for_teacher = [];
        $message_for_parent = [];

        $msg_for_parent = '';


        foreach($schedule as $jadwal)
        {
            // $lessons_for_student = array_push($lessons_for_student, $jadwal->lesson->name); 

            array_push($lessons_for_student, $jadwal->lesson);
            foreach($jadwal->room->student as $student)
            {
                $msg = 'Pemberitahuan, Kepada :  '.$student->name.', Jadwal ' . $message_predicate['student'] . ' pada hari ' . $today->name . ' tanggal ' . date('d M Y') . ' adalah ';

                $msg_for_parent = '';

                if($student->wali)
                {
                    if($student->wali->phone && $student->wali->name){
                        $msg_for_parent = 'Pemberitahuan, Kepada :  '.$student->wali->name.', Jadwal ' . $message_predicate['student'] . ' anak Anda '. $student->name .' pada hari ' . $today->name . ' tanggal ' . date('d M Y') . ' adalah ';
                        $msg_for_parent .= $jadwal->lesson->name . ' pada jam ' . $jadwal->start . ' sampai ' . $jadwal->end . ' oleh Guru ' . $jadwal->lesson->teacher->name;

                        $data_parent = [
                            'name' => $student->wali->name,
                            'phone' => $student->wali->phone,
                            'message' => $msg_for_parent
                        ];
                        array_push($message_for_parent, $data_parent);
                    }
                }

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
            $msg_for_teacher = 'Pemberitahuan, Kepada :  '.$jadwal->lesson->teacher->name.', Jadwal ' . $message_predicate['teacher'] . ' Anda pada hari ' . $today->name . ' tanggal ' . date('d M Y') . ' adalah ';
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
            $process = exec('gammu-smsd-inject TEXT '.$message_for_student[$i]['student_phone'].' -text "'.$message_for_student[$i]['message'].'"');

            if(!$process)
            {

                $broadcast = new Broadcast;
                $broadcast->name = 'Pemberitahuan Jadwal Belajar Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Siswa ' . $message_for_student[$i]['student_name'] . ' ('.$message_for_student[$i]['student_phone'].')';
                $broadcast->destination = $message_for_student[$i]['student_phone'];
                $broadcast->message = $message = $this->addSignatureMessage($message_for_student[$i]['message']);
                if($broadcast->save())
                {
                    unset($broadcast);
                }
            }
        }
        

        //Looping for Sending SMS for Parent
        for($x = 0; $x < count($message_for_parent); $x++)
        {
            //Execute Gammu Command for Sending a SMS
            $process = exec('gammu-smsd-inject TEXT '.$message_for_parent[$x]['phone'].' -text "'.$message_for_parent[$x]['message'].'"');

            if(!$process)
            {

                $broadcast = new Broadcast;
                $broadcast->name = 'Pemberitahuan Jadwal Belajar Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Siswa ' . $message_for_parent[$x]['name'] . ' ('.$message_for_parent[$x]['phone'].')';
                $broadcast->destination = $message_for_parent[$x]['phone'];
                $broadcast->message = $message = $this->addSignatureMessage($message_for_parent[$x]['message']);
                if($broadcast->save())
                {
                    unset($broadcast);
                }
            }
        }
        
        //Looping for Sending SMS for Teacher
        for($y = 0; $y < count($message_for_teacher); $y++)
        {
            $process = exec('gammu-smsd-inject TEXT '.$message_for_teacher[$y]['teacher_phone'].' -text "'.$message_for_teacher[$y]['message'].'"');


            if(!$process)
            {

                $broadcast = new Broadcast;
                $broadcast->name = 'Pemberitahuan Jadwal Mengajar pada Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Guru ' . $message_for_teacher[$y]['teacher_name'] . ' ('.$message_for_teacher[$y]['teacher_phone'].')';
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
