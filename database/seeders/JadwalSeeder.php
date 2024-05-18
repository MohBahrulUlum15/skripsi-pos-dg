<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwals')->insert([
            [
                'posyandu_id' => 1,
                'tanggal' => now(),
            ],
            [
                'posyandu_id' => 2,
                'tanggal' => now(),
            ],
            [
                'posyandu_id' => 3,
                'tanggal' => now(),
            ],
            [
                'posyandu_id' => 4,
                'tanggal' => now(),
            ],
        ]);
    }
}
