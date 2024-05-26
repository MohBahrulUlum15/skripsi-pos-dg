<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
