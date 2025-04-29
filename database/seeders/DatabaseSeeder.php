<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       Siswa::create([
        'nisn'=>'123',
        'nama'=>'dito',
        'kelas'=>'VIIA',
        'agama'=>'islam',
        'password' =>  Hash::make('123'),
       ]);

       Siswa::create([
        'nisn'=>'12345',
        'nama'=>'dito',
        'kelas'=>'VIIA',
        'agama'=>'islam',
        'password' =>  Hash::make('123'),
       ]);
    }
}
