<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeanggotaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keanggotaans')->insert([
            //Keanggotaan Usia -> id_var = 1
            [
                'nama_keanggotaan' => 'Bayi',
                'nama_fungsi' => 'Linear Turun',
                'bb_l' => 0,
                'bt_l' => 6,
                'ba_l' => 11,
                'bb_p' => 0,
                'bt_p' => 6,
                'ba_p' => 11,
                'variabel_id' => 1,
            ],
            [
                'nama_keanggotaan' => 'Baduta',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 9,
                'bt_l' => 16,
                'ba_l' => 23,
                'bb_p' => 9,
                'bt_p' => 16,
                'ba_p' => 23,
                'variabel_id' => 1,
            ],
            [
                'nama_keanggotaan' => 'Balita 1',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 21,
                'bt_l' => 31,
                'ba_l' => 41,
                'bb_p' => 21,
                'bt_p' => 31,
                'ba_p' => 41,
                'variabel_id' => 1,
            ],
            [
                'nama_keanggotaan' => 'Balita 2',
                'nama_fungsi' => 'Linear Naik',
                'bb_l' => 39,
                'bt_l' => 49,
                'ba_l' => 60,
                'bb_p' => 39,
                'bt_p' => 49,
                'ba_p' => 60,
                'variabel_id' => 1,
            ],

            //Keanggotaan Berat Badan -> id_var = 2
            [
                'nama_keanggotaan' => 'Sangat Kurang',
                'nama_fungsi' => 'Linear Turun',
                'bb_l' => 2,
                'bt_l' => 4,
                'ba_l' => 6,
                'bb_p' => 2,
                'bt_p' => 4,
                'ba_p' => 6,
                'variabel_id' => 2,
            ],
            [
                'nama_keanggotaan' => 'Kurang',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 4,
                'bt_l' => 8,
                'ba_l' => 12,
                'bb_p' => 4,
                'bt_p' => 8,
                'ba_p' => 11,
                'variabel_id' => 2,
            ],
            [
                'nama_keanggotaan' => 'Normal',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 8,
                'bt_l' => 13,
                'ba_l' => 18,
                'bb_p' => 9,
                'bt_p' => 13,
                'ba_p' => 18,
                'variabel_id' => 2,
            ],
            [
                'nama_keanggotaan' => 'Lebih',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 15,
                'bt_l' => 18,
                'ba_l' => 23,
                'bb_p' => 15,
                'bt_p' => 20,
                'ba_p' => 24,
                'variabel_id' => 2,
            ],
            [
                'nama_keanggotaan' => 'Sangat Lebih',
                'nama_fungsi' => 'Linear Naik',
                'bb_l' => 21,
                'bt_l' => 23,
                'ba_l' => 28,
                'bb_p' => 22,
                'bt_p' => 25,
                'ba_p' => 28,
                'variabel_id' => 2,
            ],

            //Keanggotaan Tinggi Badan -> id_var = 3
            [
                'nama_keanggotaan' => 'Sangat Pendek',
                'nama_fungsi' => 'Linear Turun',
                'bb_l' => 44,
                'bt_l' => 48,
                'ba_l' => 56,
                'bb_p' => 43,
                'bt_p' => 47,
                'ba_p' => 55,
                'variabel_id' => 3,
            ],
            [
                'nama_keanggotaan' => 'Pendek',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 48,
                'bt_l' => 65,
                'ba_l' => 80,
                'bb_p' => 47,
                'bt_p' => 64,
                'ba_p' => 78,
                'variabel_id' => 3,
            ],
            [
                'nama_keanggotaan' => 'Normal',
                'nama_fungsi' => 'Segitiga',
                'bb_l' => 66,
                'bt_l' => 94,
                'ba_l' => 126,
                'bb_p' => 64,
                'bt_p' => 92,
                'ba_p' => 124,
                'variabel_id' => 3,
            ],
            [
                'nama_keanggotaan' => 'Tinggi',
                'nama_fungsi' => 'Linear Naik',
                'bb_l' => 110,
                'bt_l' => 126,
                'ba_l' => 130,
                'bb_p' => 108,
                'bt_p' => 124,
                'ba_p' => 130,
                'variabel_id' => 3,
            ]
        ]);
    }
}
