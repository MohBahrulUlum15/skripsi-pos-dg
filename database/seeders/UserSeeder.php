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
            //admin
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089xxxxxxxxx',
                'roles' => 'admin'
            ],

            //bidan
            [
                'id' => 2,
                'name' => 'Siti Aisyah',
                'email' => 'siti.aisyah@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089111111111',
                'roles' => 'nakes'
            ],
            [
                'id' => 3,
                'name' => 'Rina Mulyani',
                'email' => 'rina.mulyani@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089222222222',
                'roles' => 'nakes'
            ],
            [
                'id' => 4,
                'name' => 'Dewi Sartika',
                'email' => 'dewi.sartika@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089333333333',
                'roles' => 'nakes'
            ],
            [
                'id' => 5,
                'name' => 'Yulia Dewi',
                'email' => 'yulia.dewi@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089444444444',
                'roles' => 'nakes'
            ],
            [
                'id' => 6,
                'name' => 'Maya Putri',
                'email' => 'maya.putri@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089555555555',
                'roles' => 'nakes'
            ],
            [
                'id' => 7,
                'name' => 'Rita Anjani',
                'email' => 'rita.anjani@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089666666666',
                'roles' => 'nakes'
            ],
            [
                'id' => 8,
                'name' => 'Ayu Lestari',
                'email' => 'ayu.lestari@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089777777777',
                'roles' => 'nakes'
            ],
            [
                'id' => 9,
                'name' => 'Dian Fitri',
                'email' => 'dian.fitri@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089888888888',
                'roles' => 'nakes'
            ],
            [
                'id' => 10,
                'name' => 'Fitria Hasanah',
                'email' => 'fitria.hasanah@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089999999999',
                'roles' => 'nakes'
            ],
            [
                'id' => 11,
                'name' => 'Lina Kurniawati',
                'email' => 'lina.kurniawati@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089101010101',
                'roles' => 'nakes'
            ],

            //orang tua
            [
                'id' => 12,
                'name' => 'Halima',
                'email' => 'halima@gmail.com',
                'password' => Hash::make('password'),
                // 'phone' => '089xxxxxxx1',
                'roles' => 'user'
            ],
        ]);

        // Generate 29 additional user data
        // $users = [];
        // for ($i = 13; $i <= 41; $i++) {
        //     $users[] = [
        //         'id' => $i,
        //         'name' => 'Orang Tua ' . $i,
        //         'email' => 'orangtua' . $i . '@gmail.com',
        //         'password' => Hash::make('password'),
        //         // 'phone' => '089' . str_pad($i, 9, '0', STR_PAD_LEFT),
        //         'roles' => 'user'
        //     ];
        // }

        // DB::table('users')->insert($users);
    }
}
