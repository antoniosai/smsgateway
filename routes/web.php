<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function(){
  $now = date('D');

        $indonesian_day = [
            'Mon' => 1,
            'Tue' => 2,
            'Wed' => 3,
            'Thu' => 4,
            'Fri' => 5,
            'Sat' => 6,
        ];

        $today = App\Day::findOrFail($indonesian_day[$now]);

        $message_predicate = [
            'student' => 'Belajar',
            'teacher' => 'Mengajar'
        ];

        $student = App\Student::all();
        $teacher = App\Teacher::all();

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


            $msg_for_parent = 'Pemberitahuan, Kepada :  '.$siswa->wali->name.', schedule ' . $message_predicate['student'] . ' anak Anda '. $siswa->name .' pada hari ' . $today->name . ' tanggal ' . date('d M Y') . ' adalah ';
            $data_parent = [
                'name' => $siswa->wali->name,
                'phone' => $siswa->wali->phone,
                'message' => $msg_for_parent
            ];
            foreach($siswa->room->schedule->where('day_id', $today->id) as $schedule)
            {
                
                $matpel .= $schedule->lesson->name . ', ';
                if($siswa->wali->phone && $siswa->wali->name){
                    // $msg_for_parent .= $schedule->lesson->name . ' pada jam ' . $schedule->start . ' sampai ' . $schedule->end . ' oleh Guru ' . $schedule->lesson->teacher->name;

                    
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

        return $data_parent;
        
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

        return $message_for_parent;
        
        // return count($message_for_teacher);
        for($y = 0; $y < count($message_for_teacher); $y++)
        {
            $process = exec('gammu-smsd-inject TEXT '.$message_for_teacher[$y]['phone'].' -text "'.$message_for_teacher[$y]['message'].'"');
            // return 'gammu-smsd-inject TEXT '.$message_for_teacher[$y]['phone'].' -text "'.$message_for_teacher[$y]['message'].'"';
            $broadcast = new Broadcast;
            $broadcast->name = 'Pemberitahuan Jadwal Mengajar pada Hari ' . $today->name . ' tanggal ' . date('d-M-Y') . ' untuk Guru ' . $message_for_teacher[$y]['name'] . ' ('.$message_for_teacher[$y]['phone'].')';
            $broadcast->destination = $message_for_teacher[$y]['phone'];
            // $broadcast->message = $this->addSignatureMessage($message_for_teacher[$y]['message']);
            $broadcast->message = $message_for_teacher[$y]['message'];
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
            $broadcast->message = $this->addSignatureMessage($message_for_student[$i]['message']);
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
            $broadcast->message = $this->addSignatureMessage($message_for_parent[$x]['message']);
            if($broadcast->save())
            {
                unset($broadcast);
            }
        }


  // $command = "gammu-smsd-inject TEXT 08121494007 -text 'All your base are belong to us'";


  // exec($command, $output, $return_var);

  // var_dump($output);
});

Route::get('schedule_reminder', 'SMSController@reminder');

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'teacher'], function () {
  Route::get('/login', 'TeacherAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'TeacherAuth\LoginController@login');
  Route::post('/logout', 'TeacherAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'TeacherAuth\RegisterController@register');

  Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'TeacherAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');
});
