<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrangTuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orang_tuas')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'nik' => '3512094501770001',
                'tanggal_lahir' => '1977-05-01',
                'alamat' => 'Mangaran -Situbondo',
            ],
        ]);
    }
}
