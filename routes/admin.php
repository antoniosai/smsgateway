<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');


Route::group(['prefix' => 'profile'], function(){
    Route::get('/', 'AdminAuth\ProfileController@index');
    Route::post('save', 'AdminAuth\ProfileController@save');
});

Route::group(['prefix' => 'setting'], function(){
    Route::post('tahun_ajaran', 'AdminAuth\SettingController@tahun_ajaran');
});

Route::group(['prefix' => 'student'], function(){
    Route::get('/', 'AdminAuth\StudentController@index');
    
    Route::get('add', 'AdminAuth\StudentController@add');
    Route::post('store', 'AdminAuth\StudentController@store');
    
    Route::get('detail/{id}', 'AdminAuth\StudentController@detail');
    Route::get('edit/{id}', 'AdminAuth\StudentController@edit');
    Route::post('update', 'AdminAuth\StudentController@update');
    Route::get('delete/{id}', 'AdminAuth\StudentController@delete');


    Route::get('filter', 'AdminAuth\StudentController@search');
});


Route::group(['prefix' => 'teacher'], function(){
    Route::get('/', 'AdminAuth\TeacherController@index');
    
    Route::get('add', 'AdminAuth\TeacherController@add');
    Route::post('store', 'AdminAuth\TeacherController@store');
    
    Route::get('detail/{id}', 'AdminAuth\TeacherController@detail');
    Route::get('edit/{id}', 'AdminAuth\TeacherController@edit');
    Route::post('update', 'AdminAuth\TeacherController@update');
    Route::get('delete/{id}', 'AdminAuth\TeacherController@delete');


    Route::get('filter', 'AdminAuth\TeacherController@search');
});

Route::group(['prefix' => 'room'], function(){
    Route::get('/', 'AdminAuth\RoomController@index');
    
    Route::get('add', 'AdminAuth\RoomController@add');
    Route::post('store', 'AdminAuth\RoomController@store');
    
    Route::get('detail/{id}', 'AdminAuth\RoomController@detail');
    Route::get('edit/{id}', 'AdminAuth\RoomController@edit');
    Route::post('update', 'AdminAuth\RoomController@update');
    Route::get('delete/{id}', 'AdminAuth\RoomController@delete');
    Route::post('add_student', 'AdminAuth\RoomController@add_student');

    Route::get('jadwal/filter', 'AdminAuth\RoomController@filter_jadwal');


    Route::get('filter', 'AdminAuth\RoomController@search');
});

Route::group(['prefix' => 'lesson'], function(){
    Route::get('/', 'AdminAuth\LessonController@index');
    
    Route::get('add', 'AdminAuth\LessonController@add');
    Route::post('store', 'AdminAuth\LessonController@store');
    
    Route::get('detail/{id}', 'AdminAuth\LessonController@detail');
    Route::get('edit/{id}', 'AdminAuth\LessonController@edit');
    Route::post('update', 'AdminAuth\LessonController@update');
    Route::get('delete/{id}', 'AdminAuth\LessonController@delete');
    Route::post('add_student', 'AdminAuth\LessonController@add_student');

    Route::get('jadwal/filter', 'AdminAuth\LessonController@filter_jadwal');


    Route::get('filter', 'AdminAuth\LessonController@search');
});

Route::group(['prefix' => 'schedule'], function(){
    Route::get('/', 'AdminAuth\ScheduleController@index');
    Route::post('store', 'AdminAuth\ScheduleController@store');
    
    Route::post('update', 'AdminAuth\ScheduleController@update');
    Route::get('delete/{id}', 'AdminAuth\ScheduleController@delete');

});

Route::group(['prefix' => 'schedule_exam'], function(){
    Route::get('/', 'AdminAuth\ScheduleExamController@index');
    Route::post('store', 'AdminAuth\ScheduleExamController@store');
    
    Route::post('update', 'AdminAuth\ScheduleExamController@update');
    Route::get('delete/{id}', 'AdminAuth\ScheduleExamController@delete');

});


Route::group(['prefix' => 'broadcast'], function(){
    Route::get('/', 'AdminAuth\BroadcastController@index');
    Route::get('add', 'AdminAuth\BroadcastController@add');
    Route::post('sendSMS', 'AdminAuth\BroadcastController@sendSMS');
    Route::post('send_message', 'AdminAuth\BroadcastController@send_message');
});

