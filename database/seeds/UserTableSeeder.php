<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anik Dey',
            'email' => 'info.anikdey003@gmail.com',
            'role' => 'ADMIN',
            'password' => bcrypt('admin'),
        ]);
    }
}
