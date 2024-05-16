<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\OrangTua;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'bb_lahir' => 'required',
            'tb_lahir' => 'required',
            'orang_tua_id' => 'required',
            'posyandu_id' => 'required',
        ]);

        Balita::create($validatedData);
        return redirect()->route('orangtua.show', $request->orang_tua_id)->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Balita $balita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $balita = Balita::findOrFail($id);
        $orangtua = OrangTua::where('id', $balita->orang_tua_id)->first();
        $posyandus = Posyandu::all();
        return view('pages.balita.edit', compact('balita', 'orangtua', 'posyandus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'bb_lahir' => 'required',
            'tb_lahir' => 'required',
            'orang_tua_id' => 'required',
            'posyandu_id' => 'required',
        ]);

        $balita = Balita::findOrFail($id);

        $balita->update($validatedData);

        return redirect()->route('orangtua.show', $request->orang_tua_id)->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan balita berdasarkan ID yang diberikan
        $balita = Balita::findOrFail($id);

        // Hapus balita
        $balita->delete();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('orangtua.show', $balita->orang_tua_id)->with('message', 'Data balita berhasil dihapus');
    }
}
