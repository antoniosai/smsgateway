<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Class untuk mengirim SMS

class SendSMS extends Model
{
    protected $table = 'sent_sms';

    public function scheduleReminder()
    {
        
    }
}
