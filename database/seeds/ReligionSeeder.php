<?php

use Illuminate\Database\Seeder;
use App\Religion;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Islam', 'Hindu', 'Buddha', 'Katholik', 'Protestan'
        ];

        foreach($data as $value)
        {
            $religion = new Religion;
            $religion->name = $value;
            $religion->save();
        }
    }
}
