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
                'user_id' => 12,
                'name' => 'Halima',
                'phone' => '089666666666',
                'nik' => '3512094501770001',
                'tanggal_lahir' => '1977-05-01',
                'alamat' => 'Mangaran - Situbondo',
            ],
        ]);

        // Generate 29 additional orang tua data
        // $orangTuas = [];
        // for ($i = 2; $i <= 30; $i++) {
        //     $orangTuas[] = [
        //         'id' => $i,
        //         'user_id' => $i + 11,
        //         'name' => 'Orang Tua ' . $i,
        //         'phone' => '089' . str_pad($i, 9, '0', STR_PAD_LEFT),
        //         'nik' => '351209450177' . str_pad($i, 4, '0', STR_PAD_LEFT),
        //         'tanggal_lahir' => now()->subYears(30 + $i)->format('Y-m-d'),
        //         'alamat' => 'Alamat ' . $i,
        //     ];
        // }

        // DB::table('orang_tuas')->insert($orangTuas);
    }
}
