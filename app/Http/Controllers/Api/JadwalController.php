<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Jika pengguna memiliki peran "nakes"
        if ($user->roles === 'nakes') {
            return $this->jadwalByBidan($user->bidan->id);
        }

        // Jika pengguna memiliki peran "user"
        if ($user->roles === 'user') {
            return $this->jadwalByOrangTua($user->orangtua->id);
        }

        // Jika pengguna memiliki peran lainnya
        return $this->allJadwal();
    }

    // // Mendapatkan jadwal berdasarkan bidan yang terkait
    private function jadwalByBidan($bidanId)
    {
        // Ambil semua Posyandu yang memiliki bidan dengan ID tertentu
        $posyandus = Posyandu::whereHas('bidans', function ($query) use ($bidanId) {
            $query->where('bidan_id', $bidanId);
        })->with(['jadwal', 'bidans.user'])->get();

        // Inisialisasi array untuk menyimpan semua jadwal
        $jadwals = [];

        // Iterasi setiap Posyandu dan gabungkan jadwal mereka
        foreach ($posyandus as $posyandu) {
            foreach ($posyandu->jadwal as $jadwal) {
                $bidanNames = $posyandu->bidans->map(function ($bidan) {
                    return [
                        'bidan_id' => $bidan->id,
                        'name' => $bidan->user->name
                    ];
                })->toArray();
                $jadwals[] = [
                    'id' => $jadwal->id,
                    'posyandu_id' => $posyandu->id,
                    'nama_posyandu' => $posyandu->name,
                    'tanggal' => $jadwal->tanggal,
                    // 'bidans' => $bidanNames
                ];
            }
        }

        // Mengembalikan response JSON dengan semua jadwal yang ditemukan
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data',
            'data' => $jadwals
        ]);
    }

    private function jadwalByOrangTua($orangTuaId)
    {
        $posyandus = Posyandu::with(['bidans.user', 'jadwal'])->whereHas('balita', function ($query) use ($orangTuaId) {
            $query->where('orang_tua_id', $orangTuaId);
        })->get();

        // Inisialisasi array untuk menyimpan semua jadwal
        $jadwals = [];

        // Iterasi setiap Posyandu dan gabungkan jadwal mereka
        foreach ($posyandus as $posyandu) {
            foreach ($posyandu->jadwal as $jadwal) {
                $bidanNames = $posyandu->bidans->map(function ($bidan) {
                    return [
                        'bidan_id' => $bidan->id,
                        'name' => $bidan->user->name
                    ];
                })->toArray();
                $jadwals[] = [
                    'id' => $jadwal->id,
                    'posyandu_id' => $posyandu->id,
                    'nama_posyandu' => $posyandu->name,
                    'tanggal' => $jadwal->tanggal,
                    // 'bidans' => $bidanNames
                ];
            }
        }

        // Mengembalikan response JSON dengan semua jadwal yang ditemukan
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data',
            'data' => $jadwals
        ]);
    }


    // Mendapatkan semua jadwal
    private function allJadwal()
    {
        $jadwals = Jadwal::with('posyandu.bidans.user')->get();

        // Inisialisasi array untuk menyimpan semua jadwal
        $formattedJadwals = [];

        // Iterasi setiap jadwal dan tambahkan informasi posyandu
        foreach ($jadwals as $jadwal) {
            $bidanNames = $jadwal->posyandu->bidans->map(function ($bidan) {
                return [
                    'bidan_id' => $bidan->id,
                    'name' => $bidan->user->name
                ];
            })->toArray();
            $formattedJadwals[] = [
                'id' => $jadwal->id,
                'posyandu_id' => $jadwal->posyandu->id,
                'nama_posyandu' => $jadwal->posyandu->name,
                'tanggal' => $jadwal->tanggal,
                // 'bidans' => $bidanNames
            ];
        }

        // Mengembalikan response JSON dengan semua jadwal yang ditemukan
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data',
            'data' => $formattedJadwals
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getListPemeriksaanByJadwal(Request $request, $jadwal_id)
    {
        $user = auth()->user();

        // Jika pengguna memiliki peran "nakes"
        if ($user->roles === 'nakes') {

            // Validasi jadwal_id
            $jadwal = Jadwal::with('posyandu')->find($jadwal_id);
            if (!$jadwal) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal tidak ditemukan',
                ], 404);
            }

            // Ambil pemeriksaan berdasarkan jadwal_id
            $pemeriksaans = Pemeriksaan::with('balita')
                ->where('jadwal_id', $jadwal_id)
                ->get();

            // Format data balita dari pemeriksaan
            $balitas = $pemeriksaans->map(function ($pemeriksaan) {
                return [
                    'id_pemeriksaan' => $pemeriksaan->id,
                    'id_balita' => $pemeriksaan->balita->id,
                    'name' => $pemeriksaan->balita->name,
                    'tanggal_lahir' => $pemeriksaan->balita->tanggal_lahir,
                    'jenis_kelamin' => $pemeriksaan->balita->jenis_kelamin,
                    'usia' => $pemeriksaan->usia,
                    'berat_badan' => $pemeriksaan->berat_badan,
                    'tinggi_badan' => $pemeriksaan->tinggi_badan,
                    'status' => $pemeriksaan->status,
                    // 'orang_tua_id' => $pemeriksaan->balita->orang_tua_id,
                    // 'posyandu_id' => $pemeriksaan->balita->posyandu_id,
                ];
            });

            // Mengembalikan response JSON dengan data balita yang ditemukan
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengambil data',
                'data' => $balitas,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }
    }
}
