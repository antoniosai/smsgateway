<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SMSController;

use Log;

use DB;

use App\Schedule;
use App\Broadcast;
use App\Day;

class SendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirimkan SMS Broadcast';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('broadcasts')->delete();

        // $this->info('Berhasil menghapus Broadcast ' . $message_for_student[0]['student_phone']);
    }
}
