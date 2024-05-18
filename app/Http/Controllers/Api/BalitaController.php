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
        $user = $request->user();

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
}
