<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin HRD',
            'nik' => 'adminhrd',
            'password' => bcrypt('password'),
            'email' => 'admin@mail.com'
        ]);
    }
}
