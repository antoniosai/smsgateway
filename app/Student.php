<?php

namespace App;

use App\Notifications\StudentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
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
        $this->notify(new StudentResetPassword($token));
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
        return $this->belongsTo('App\Room');
    }

    public function leader()
    {
        return $this->hasOne('App\Room');
    }

    public function wali()
    {
        return $this->belongsTo('App\Parents', 'parents_id');
    }
}
