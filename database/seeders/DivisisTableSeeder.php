<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisis = collect(['Divisi A', 'Divisi B', 'Divisi C', 'Divisi D']);
        $divisis->each(function ($c) {
            \App\Models\Divisi::create([
                'nama' => $c
            ]);
        });
    }
}
