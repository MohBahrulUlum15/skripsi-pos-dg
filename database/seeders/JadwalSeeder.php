<?php

namespace Database\Seeders;

use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use App\Models\Posyandu;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $posyandus = Posyandu::all();
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();

        foreach ($posyandus as $posyandu) {
            for ($date = $startDate; $date->lessThanOrEqualTo($endDate); $date->addMonth()) {
                $jadwal = Jadwal::create([
                    'posyandu_id' => $posyandu->id,
                    'tanggal' => $date->format('Y-m-d'),
                ]);

                $balitas = Balita::where('posyandu_id', $posyandu->id)->get();

                foreach ($balitas as $balita) {
                    Pemeriksaan::create([
                        'usia' => $date->diffInMonths($balita->tanggal_lahir),
                        'berat_badan' => rand(25, 40) / 10,
                        'tinggi_badan' => rand(50, 100) / 10,
                        'status' => 'sudah',
                        'jadwal_id' => $jadwal->id,
                        'balita_id' => $balita->id,
                    ]);
                }
            }
        }
    }
}
