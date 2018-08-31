<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();

    //dd($users);

    return view('student.home');
})->name('home');

Route::group(['prefix' => 'profile'], function(){
    Route::get('/', 'StudentAuth\ProfileController@index');
    Route::post('save', 'StudentAuth\ProfileController@save');
});

Route::group(['prefix' => 'announcement'], function(){
    Route::get('/', 'StudentAuth\AnnouncementController@index');
    Route::get('detail/{id}', 'StudentAuth\AnnouncementController@detail');
});

Route::group(['prefix' => 'schedule'], function(){
    Route::get('exam', 'StudentAuth\ScheduleController@exam');
    Route::get('exam/filter', 'StudentAuth\ScheduleController@exam_filter');
    
    Route::get('lesson', 'StudentAuth\ScheduleController@lesson');
    Route::get('lesson/filter', 'StudentAuth\ScheduleController@lesson_filter');
});