<?php

namespace App\Http\Controllers;

use App\Models\Bidan;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count = 1;

        $posyandus = DB::table('posyandus')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(10);

        return view('pages.posyandu.index', compact('posyandus', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidans = Bidan::all();
        return view('pages.posyandu.create', compact('bidans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'bidan_id' => 'required|array',
            'bidan_id.*' => 'exists:bidans,id',
        ]);

        $posyandu = Posyandu::create([
            'name' => $validatedData['name'],
            'alamat' => $validatedData['alamat'],
        ]);

        $posyandu->bidans()->sync($validatedData['bidan_id']);

        return redirect()->route('posyandu.index')->with('message', 'Posyandu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $bidans = Bidan::all();
        $selectedBidans = $posyandu->bidans->pluck('id')->toArray();
        return view('pages.posyandu.edit', compact('posyandu', 'bidans', 'selectedBidans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'bidan_id' => 'required|array',
            'bidan_id.*' => 'exists:bidans,id',
        ]);

        $posyandu = Posyandu::findOrFail($id);

        $posyandu->update([
            'name' => $validatedData['name'],
            'alamat' =>$validatedData['alamat'],
        ]);

        $posyandu->bidans()->sync($validatedData['bidan_id']);

        return redirect()->route('posyandu.index')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $posyandu = Posyandu::findOrFail($id);
        // $posyandu->delete();
        // return redirect()->route('posyandu.index');

        $posyandu = Posyandu::findOrFail($id);
        $posyandu->bidans()->detach(); // Jika ada relasi many-to-many
        $posyandu->delete();

        return redirect()->route('posyandu.index')->with('message', 'Posyandu deleted successfully.');
    }
}
