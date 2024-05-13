<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('variabels')->insert([
            //variabel INPUT
            [
                'name' => 'Usia',
                'tipe' => 'INPUT',
                'satuan' => 'Bulan'
            ],
            [
                'name' => 'Berat Badan',
                'tipe' => 'INPUT',
                'satuan' => 'Kilogram (Kg)'
            ],
            [
                'name' => 'Tinggi Badan',
                'tipe' => 'INPUT',
                'satuan' => 'Centimeter (cm)'
            ],

            //variabel OUTPUT
            [
                'name' => 'BB/U',
                'tipe' => 'OUTPUT',
                'satuan' => '-'
            ],
            [
                'name' => 'TB/U',
                'tipe' => 'OUTPUT',
                'satuan' => '-'
            ],
            [
                'name' => 'BB/TB',
                'tipe' => 'OUTPUT',
                'satuan' => '-'
            ],
        ]);
    }
}
