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
        'nis'=>'123',
        'nama'=>'dito',
        'kelas'=>'VIIA',
        'agama'=>'Islam',
        'password' =>  Hash::make('123'),
       ]);

       Siswa::create([
        'nis'=>'1234',
        'nama'=>'farhan',
        'kelas'=>'VIIA',
        'agama'=>'Islam',
        'password' =>  Hash::make('123'),
       ]);

       Siswa::create([
        'nis'=>'12345',
        'nama'=>'ditos',
        'kelas'=>'VIIC',
        'agama'=>'Kristen',
        'password' =>  Hash::make('123'),
       ]);

       Siswa::create([
        'nis'=>'123456',
        'nama'=>'afni',
        'kelas'=>'VIID',
        'agama'=>'Islam',
        'password' =>  Hash::make('123'),
       ]);
    }
}
