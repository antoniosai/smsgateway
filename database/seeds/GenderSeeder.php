<?php

use Illuminate\Database\Seeder;

use App\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Laki-laki',
            'name' => 'Peremppuan'
        ];

        foreach($data as $value)
        {
            $gender = new Gender;
            $gender->name = $value;
            $gender->save();
        }
    }
}
