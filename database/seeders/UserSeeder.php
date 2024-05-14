<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '089xxxxxxxxx',
                'roles' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'Siti Aisyah',
                'email' => 'siti.aisyah@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '089xxxxxxxxx',
                'roles' => 'nakes'
            ],
            [
                'id' => 3,
                'name' => 'Halima',
                'email' => 'halima@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '089xxxxxxxxx',
                'roles' => 'user'
            ],
        ]);
    }
}
