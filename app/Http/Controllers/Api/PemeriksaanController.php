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

        $request->validate([
            'id' => 'required|exists:pemeriksaans,id',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'status_gizi_bb_u' => 'required',
            'deff_val_bb_u' => 'required',
            'val_degree_bb_u' => 'required',
            'status_gizi_tb_u' => 'required',
            'deff_val_tb_u' => 'required',
            'val_degree_tb_u' => 'required',
            'status_gizi_bb_tb' => 'required',
            'deff_val_bb_tb' => 'required',
            'val_degree_bb_tb' => 'required',
        ]);

        // Jika pengguna memiliki peran "nakes"
        if ($user->roles === 'nakes') {

            Pemeriksaan::findOrFail($request->id)->update([
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'status' => "sudah",
            ]);

            HasilFuzzy::findOrFail($request->id)->update([
                'status_gizi_bb_u' => $request->status_gizi_bb_u,
                'deff_val_bb_u' => $request->deff_val_bb_u,
                'val_degree_bb_u' => $request->val_degree_bb_u,
                'status_gizi_tb_u' => $request->status_gizi_tb_u,
                'deff_val_tb_u' => $request->deff_val_tb_u,
                'val_degree_tb_u' => $request->val_degree_tb_u,
                'status_gizi_bb_tb' => $request->status_gizi_bb_tb,
                'deff_val_bb_tb' => $request->deff_val_bb_tb,
                'val_degree_bb_tb' => $request->val_degree_bb_tb,
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

    public function getPemeriksaanBalita(Request $request, $balita_id)
    {
        // $status = $request->query('status');

        $pemeriksaan = Pemeriksaan::with('hasilFuzzy')->where('balita_id', $balita_id)->where('status', 'sudah')->get();

        if ($pemeriksaan->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data pemeriksaan tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data pemeriksaan',
            'data' => $pemeriksaan,
        ]);
    }
}
