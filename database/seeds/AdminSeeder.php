<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\Admin;
        $admin->name = 'Administrator';
        $admin->username = 'admin';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
    }
}
