<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HasilFuzzy;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function postPemeriksaan(Request $request)
    {
        $user = auth()->user();

        // Jika pengguna memiliki peran "nakes"
        if ($user->roles === 'nakes') {

            Pemeriksaan::findOrFail($request->id)->update([
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'status' => "sudah",
            ]);

            HasilFuzzy::create([
                'pemeriksaan_id' => $request->id,
                'status_gizi_bb_u' => $request->status_gizi_bb_u,
                'deff_val_bb_u' => $request->deff_val_bb_u,
                'status_degree_bb_u' => $request->status_degree_bb_u,
                'status_gizi_tb_u' => $request->status_gizi_tb_u,
                'deff_val_tb_u' => $request->deff_val_tb_u,
                'status_degree_tb_u' => $request->status_degree_tb_u,
                'status_gizi_bb_tb' => $request->status_gizi_bb_tb,
                'deff_val_bb_tb' => $request->deff_val_bb_tb,
                'status_degree_bb_tb' => $request->status_degree_bb_tb,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }
    }
}
