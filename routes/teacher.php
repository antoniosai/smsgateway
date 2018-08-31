<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('teacher')->user();

    //dd($users);

    return view('teacher.home');
})->name('home');



Route::group(['prefix' => 'profile'], function(){
    Route::get('/', 'TeacherAuth\ProfileController@index');
    Route::post('save', 'TeacherAuth\ProfileController@save');
});

Route::group(['prefix' => 'announcement'], function(){
    Route::get('/', 'TeacherAuth\AnnouncementController@index');
    Route::get('detail/{id}', 'TeacherAuth\AnnouncementController@detail');
});

Route::group(['prefix' => 'schedule'], function(){
    Route::get('exam', 'TeacherAuth\ScheduleController@exam');
    Route::get('exam/filter', 'TeacherAuth\ScheduleController@exam_filter');
    
    Route::get('lesson', 'TeacherAuth\ScheduleController@lesson');
    Route::get('lesson/filter', 'TeacherAuth\ScheduleController@lesson_filter');
});