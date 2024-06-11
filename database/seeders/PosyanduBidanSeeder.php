<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosyanduBidanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posyandu_bidan')->insert([
            [
                'posyandu_id' => 1,
                'bidan_id' => 1,
            ],
            [
                'posyandu_id' => 1,
                'bidan_id' => 2,
            ],
            [
                'posyandu_id' => 2,
                'bidan_id' => 2,
            ],
            [
                'posyandu_id' => 2,
                'bidan_id' => 4,
            ],
            [
                'posyandu_id' => 3,
                'bidan_id' => 3,
            ],
            [
                'posyandu_id' => 3,
                'bidan_id' => 1,
            ],
            [
                'posyandu_id' => 4,
                'bidan_id' => 6,
            ],
            [
                'posyandu_id' => 4,
                'bidan_id' => 4,
            ],
            [
                'posyandu_id' => 5,
                'bidan_id' => 5,
            ],
            [
                'posyandu_id' => 5,
                'bidan_id' => 1,
            ],
            [
                'posyandu_id' => 6,
                'bidan_id' => 6,
            ],
            [
                'posyandu_id' => 6,
                'bidan_id' => 5,
            ],
            [
                'posyandu_id' => 7,
                'bidan_id' => 7,
            ],
            [
                'posyandu_id' => 7,
                'bidan_id' => 4,
            ],
            [
                'posyandu_id' => 8,
                'bidan_id' => 8,
            ],
            [
                'posyandu_id' => 8,
                'bidan_id' => 3,
            ],
        ]);
    }
}
