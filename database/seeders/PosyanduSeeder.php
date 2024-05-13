<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posyandus')->insert([
            [
                'name' => 'Cempaka 1',
                'alamat' => '-'
            ],
            [
                'name' => 'Cempaka 2',
                'alamat' => '-'
            ],
            [
                'name' => 'Melati 1',
                'alamat' => '-'
            ],
            [
                'name' => 'Melati 2',
                'alamat' => '-'
            ],
            [
                'name' => 'Anggrek 1',
                'alamat' => '-'
            ],
            [
                'name' => 'Anggrek 2',
                'alamat' => '-'
            ],
            [
                'name' => 'Mawar',
                'alamat' => '-'
            ],
            [
                'name' => 'Wijaya Kusuma',
                'alamat' => '-'
            ],
        ]);

        // Cempaka 1 : 31
        // Cempaka 2 : 22
        // Melati 1 : 32
        // Melati 2 : 36
        // Anggrek 1  : 68
        // Anggrek 2 : 20
        // Mawar : 58
        // Wikus : 38
    }
}
