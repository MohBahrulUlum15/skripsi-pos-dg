<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balita;
use App\Models\Bidan;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

    public function getPosyanduByBidan(Request $request)
    {
        $user = $request->user();

        // Periksa apakah user yang login adalah bidan
        if ($user->roles === 'nakes') {
            // Asumsi user_id adalah foreign key di tabel bidans
            $bidan = Bidan::where('user_id', $user->id)->first();

            if ($bidan) {
                $posyandus = $bidan->posyandus; // Mengambil posyandu terkait dengan bidan
                // Memformat data posyandu untuk hanya menyertakan id, name, dan alamat
                $formattedPosyandus = $posyandus->map(function ($posyandu) {
                    return [
                        'id' => $posyandu->id,
                        'name' => $posyandu->name,
                        'alamat' => $posyandu->alamat,
                    ];
                });

                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil mengambil data',
                    'data' => $formattedPosyandus,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Bidan tidak ditemukan',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }
    }

    public function getListBalitaInPosyandu(Request $request, $posyandu_id)
    {
        $user = auth()->user();

        // Periksa apakah user yang login adalah bidan
        if ($user->roles !== 'nakes') {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        } else {
            $posyandu = Posyandu::with('balita')->find($posyandu_id);
            if (!$posyandu) {
                return response()->json([
                    'success' => false,
                    'message' => 'Posyandu tidak ditemukan',
                ], 404);
            } else {
                $balitas = Balita::with('posyandu')->where('posyandu_id', $posyandu_id)->get();

                $formattedBalita = $balitas->map(function ($balita) {
                    return [
                        'id' => $balita->id,
                        'name' => $balita->name,
                        'tanggal_lahir' => $balita->tanggal_lahir,
                        'jenis_kelamin' => $balita->jenis_kelamin,
                        'bb_lahir' => $balita->bb_lahir,
                        'tb_lahir' => $balita->tb_lahir,
                        'orang_tua_id' => $balita->orang_tua_id,
                        'posyandu_id' => $balita->posyandu_id,
                    ];
                });

                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil mengambil data',
                    'data' => $formattedBalita,
                ]);
            }
        }
    }
}
