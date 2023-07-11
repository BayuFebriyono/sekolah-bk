<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Guru::create([
            'nip' => '123',
            'password' => bcrypt('123'),
            'nama' => 'Ahmad',
            'alamat' => 'Sooko',
            'jenis_kelamin' => 'L',
            'admin' => true
        ]);
    }
}
