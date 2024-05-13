<?php

namespace App\Http\Controllers;

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
            ->paginate(5);

        return view('pages.posyandu.index', compact('posyandus', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.posyandu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255'
        ]);

        $posyandu = Posyandu::create([
            'name' => $request->name,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('posyandu.index');
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
        return view('pages.posyandu.edit', compact('posyandu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $posyandu = Posyandu::findOrFail($id);

        $posyandu->update($data);
        return redirect()->route('posyandu.index')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $posyandu->delete();
        return redirect()->route('posyandu.index');
    }
}
