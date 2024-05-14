<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('balitas')->insert([
            [
                'id' => 1,
                'name' => "Moh Bahrul Ulum",
                'tanggal_lahir' => now(),
                'jenis_kelamin' => 'L',
                'bb_lahir' => 3.8,
                'tb_lahir' => 48,
                'orangtua_id' => 1,
                'posyandu_id' => 1,
            ],
            [
                'id' => 2,
                'name' => "Nur Aini",
                'tanggal_lahir' => now(),
                'jenis_kelamin' => 'P',
                'bb_lahir' => 3.6,
                'tb_lahir' => 44,
                'orangtua_id' => 1,
                'posyandu_id' => 1,
            ],
        ]);
    }
}
