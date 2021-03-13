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
        \App\Models\User::create(
            [
                'name' => 'Admin HRD',
                'role_id' => 1,
                'divisi_id' => 1,
                'nik' => 'adminhrd',
                'gender' => 'Pria',
                'password' => bcrypt('password'),
                'email' => 'admin@mail.com'
            ]
        );
    }
}
