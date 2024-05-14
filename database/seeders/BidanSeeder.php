<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidans')->insert([
            'id' => 1,
            'user_id' => 2,
            'nip' => '32908526983924',
            'tanggal_lahir' => '1994-01-01',
            'alamat' => 'Mangaran -Situbondo',
        ]);
    }
}
