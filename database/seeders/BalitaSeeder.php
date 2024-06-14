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
            // balita dari orang tua dengan id orang tua 1
            [
                'id' => 1,
                'name' => "Moh Bahrul Ulum",
                'tanggal_lahir' => '2021-01-01',
                'jenis_kelamin' => 'L',
                'bb_lahir' => 3.8,
                'tb_lahir' => 48,
                'orang_tua_id' => 1,
                'posyandu_id' => 1,
            ],
            [
                'id' => 2,
                'name' => "Nur Aini",
                'tanggal_lahir' => '2021-01-01',
                'jenis_kelamin' => 'P',
                'bb_lahir' => 3.6,
                'tb_lahir' => 44,
                'orang_tua_id' => 1,
                'posyandu_id' => 1,
            ],
        ]);

        // $balitas = [];
        // $posyandus = range(1, 8); // IDs for posyandu

        // for ($i = 1; $i <= 30; $i++) {
        //     $posyandu_id = $posyandus[array_rand($posyandus)]; // Random posyandu ID for each parent
        //     for ($j = 1; $j <= rand(2, 4); $j++) { // Each parent has 2 to 4 children
        //         $balitas[] = [
        //             'name' => 'Balita ' . $i . '-' . $j,
        //             'tanggal_lahir' => now()->subYears(rand(1, 3))->subMonths(rand(0, 11))->format('Y-m-d'),
        //             'jenis_kelamin' => rand(0, 1) ? 'L' : 'P',
        //             'bb_lahir' => rand(25, 40) / 10,
        //             'tb_lahir' => rand(44, 52),
        //             'orang_tua_id' => $i,
        //             'posyandu_id' => $posyandu_id,
        //         ];
        //     }
        // }

        // DB::table('balitas')->insert($balitas);
    }
}
