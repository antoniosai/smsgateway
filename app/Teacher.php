<?php

namespace App;

use App\Notifications\TeacherResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPassword($token));
    }

    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function religion()
    {
        return $this->belongsTo('App\Religion');
    }

    public function room()
    {
        return $this->hasOne('App\Room');
    }

    public function lesson()
    {
        return $this->hasMany('App\Lesson');
    }

    public function exam()
    {
        return $this->hasMany('App\ScheduleExam', 'teacher_id');
    }

    
}
