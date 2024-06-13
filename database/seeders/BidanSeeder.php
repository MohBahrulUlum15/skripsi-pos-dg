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
            [
                'id' => 1,
                'user_id' => 2,
                'name' => 'Siti Aisyah',
                'phone' => '089111111111',
                'nip' => '32908526983924',
                'tanggal_lahir' => '1994-01-01',
                'alamat' => 'Mangaran - Situbondo',
            ],
            [
                'id' => 2,
                'name' => 'Rina Mulyani',
                'phone' => '089222222222',
                'user_id' => 3,
                'nip' => '32908526983935',
                'tanggal_lahir' => '1985-03-12',
                'alamat' => 'Jember - Jawa Timur',
            ],
            [
                'id' => 3,
                'user_id' => 4,
                'name' => 'Dewi Sartika',
                'phone' => '089333333333',
                'nip' => '32908526983936',
                'tanggal_lahir' => '1988-08-15',
                'alamat' => 'Bondowoso - Jawa Timur',
            ],
            [
                'id' => 4,
                'user_id' => 5,
                'name' => 'Yulia Dewi',
                'phone' => '089444444444',
                'nip' => '32908526983937',
                'tanggal_lahir' => '1990-05-10',
                'alamat' => 'Banyuwangi - Jawa Timur',
            ],
            [
                'id' => 5,
                'user_id' => 6,
                'name' => 'Siti Aisyah',
                'phone' => '089555555555',
                'nip' => '32908526983938',
                'tanggal_lahir' => '1992-07-25',
                'alamat' => 'Malang - Jawa Timur',
            ],
            [
                'id' => 6,
                'user_id' => 7,
                'name' => 'Maya Putri',
                'phone' => '089666666666',
                'nip' => '32908526983939',
                'tanggal_lahir' => '1984-12-19',
                'alamat' => 'Probolinggo - Jawa Timur',
            ],
            [
                'id' => 7,
                'user_id' => 8,
                'name' => 'Rita Anjani',
                'phone' => '089777777777',
                'nip' => '32908526983940',
                'tanggal_lahir' => '1987-11-11',
                'alamat' => 'Pasuruan - Jawa Timur',
            ],
            [
                'id' => 8,
                'user_id' => 9,
                'name' => 'Ayu Lestari',
                'phone' => '089888888888',
                'nip' => '32908526983941',
                'tanggal_lahir' => '1989-09-19',
                'alamat' => 'Lumajang - Jawa Timur',
            ],
            [
                'id' => 9,
                'user_id' => 10,
                'name' => 'Dian Fitri',
                'phone' => '089999999999',
                'nip' => '32908526983942',
                'tanggal_lahir' => '1993-06-23',
                'alamat' => 'Kediri - Jawa Timur',
            ],
            [
                'id' => 10,
                'user_id' => 11,
                'name' => 'Fitria Hasanah',
                'phone' => '081000000000',
                'nip' => '32908526983943',
                'tanggal_lahir' => '1983-04-30',
                'alamat' => 'Blitar - Jawa Timur',
            ],
        ]);
    }
}
