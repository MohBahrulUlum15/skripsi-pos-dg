<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balita;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Periksa apakah user yang login adalah admin atau bidan
        if ($user->roles === 'admin' | $user->roles === 'nakes') {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ]);
        }

        // Ambil data balita yang terkait dengan orang tua yang login
        $balitas = Balita::where('orang_tua_id', $user->orangtua->id)->get();

        // Kembalikan data balita sebagai response JSON
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data balita',
            'data' => $balitas
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

    public function getDetailBalita(Request $request, $balita_id)
    {
        $balitaData = Balita::with('orangtua', 'posyandu', 'pemeriksaan')->find($balita_id);

        //get all pemeriksaan data by balita_id where status = 'sudah
        // $pemeriksaan = $balitaData->pemeriksaan->where('status', 'sudah');

        if (!$balitaData) {
            return response()->json([
                'success' => false,
                'message' => 'Balita tidak ditemukan',
            ], 404);
        }

        $formattedDataBalita = [
            'id' => $balitaData->id,
            'name' => $balitaData->name,
            'tanggal_lahir' => $balitaData->tanggal_lahir,
            'jenis_kelamin' => $balitaData->jenis_kelamin,
            'bb_lahir' => $balitaData->bb_lahir,
            'tb_lahir' => $balitaData->tb_lahir,
            'usia_saat_ini' => $balitaData->pemeriksaan->last()->usia,
            'bb_saat_ini' => $balitaData->pemeriksaan->last()->berat_badan,
            'tb_saat_ini' => $balitaData->pemeriksaan->last()->tinggi_badan,

            'pemeriksaan' => $balitaData->pemeriksaan->map(function ($pemeriksaan) {
                return [
                    'id' => $pemeriksaan->id,
                    'tanggal_pemeriksaan' => $pemeriksaan->updated_at,
                    'berat_badan' => $pemeriksaan->berat_badan,
                    'tinggi_badan' => $pemeriksaan->tinggi_badan,
                    'status' => $pemeriksaan->status,
                    // 'hasil_fuzzy' => $pemeriksaan->hasilFuzzy,
                ];
            }),
        ];

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data balita',
            'data' => $formattedDataBalita
        ]);
    }
}
