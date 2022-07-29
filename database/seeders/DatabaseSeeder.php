<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(4)->create();

        \App\Models\User::create([
            'username' => 'ambonxnobody',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // \App\Models\MoU::factory(100)->create();

        /*
            \App\Models\Kerjasama::create([
                'nama' => 'Kesepakatan Bersama'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Adendum'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Perjanjian Kerjasama'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Memorandum of Understanding'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Nota Kesepahaman'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Nota Kesepakatan Kerjasama'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Memorandum Persefahaman'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Nota Kesepahaman Bersama'
            ]);
            \App\Models\Kerjasama::create([
                'nama' => 'Nota Kesepahaman Kerjasama'
            ]);
        */
    }
}
