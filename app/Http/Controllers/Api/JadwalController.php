<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bidan;
use App\Models\Jadwal;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        })->with('jadwal')->get();

        // Inisialisasi array untuk menyimpan semua jadwal
        $jadwals = [];

        // Iterasi setiap Posyandu dan gabungkan jadwal mereka
        foreach ($posyandus as $posyandu) {
            foreach ($posyandu->jadwal as $jadwal) {
                $jadwals[] = [
                    'id' => $jadwal->id,
                    'posyandu_id' => $posyandu->id,
                    'nama_posyandu' => $posyandu->name,
                    'tanggal' => $jadwal->tanggal
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
        $posyandus = Posyandu::whereHas('balita', function ($query) use ($orangTuaId) {
            $query->where('orang_tua_id', $orangTuaId);
        })->with('jadwal')->get();

        // Inisialisasi array untuk menyimpan semua jadwal
        $jadwals = [];

        // Iterasi setiap Posyandu dan gabungkan jadwal mereka
        foreach ($posyandus as $posyandu) {
            foreach ($posyandu->jadwal as $jadwal) {
                $jadwals[] = [
                    'id' => $jadwal->id,
                    'posyandu_id' => $posyandu->id,
                    'nama_posyandu' => $posyandu->name,
                    'tanggal' => $jadwal->tanggal
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
        $jadwals = Jadwal::with('posyandu')->get();

        // Inisialisasi array untuk menyimpan semua jadwal
        $formattedJadwals = [];

        // Iterasi setiap jadwal dan tambahkan informasi posyandu
        foreach ($jadwals as $jadwal) {
            $formattedJadwals[] = [
                'id' => $jadwal->id,
                'posyandu_id' => $jadwal->posyandu->id,
                'nama_posyandu' => $jadwal->posyandu->name,
                'tanggal' => $jadwal->tanggal
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
}
