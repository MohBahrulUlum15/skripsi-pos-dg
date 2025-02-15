<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            // 'phone' => '089516295079',
            'roles' => 'admin'
        ]);

        $this->call([
            // UserSeeder::class,
            // BidanSeeder::class,
            // OrangTuaSeeder::class,
            // PosyanduSeeder::class,
            // PosyanduBidanSeeder::class,
            // BalitaSeeder::class,
            // JadwalSeeder::class,
            // VariabelSeeder::class,
            // KeanggotaanSeeder::class,
        ]);
    }
}
