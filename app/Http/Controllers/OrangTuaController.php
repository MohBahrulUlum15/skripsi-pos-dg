<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count = 1;

        $orangtuas = OrangTua::with('user')
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })
            ->paginate(5);

        return view('pages.orangtua.index', compact('orangtuas', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.orangtua.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255'
        ]);

        $words = explode(' ', $request->name);

        if (count($words) >= 2) {
            // Jika nama memiliki dua kata atau lebih
            $firstTwoWords = $words[0] . '.' . $words[1]; // Menggabungkan dua kata pertama
        } else {
            // Jika nama hanya memiliki satu kata
            $firstTwoWords = $words[0]; // Mengambil satu kata saja
        }

        $email = strtolower($firstTwoWords) . '@gmail.com';

        $createUserForOrangTua = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => Hash::make('password'),
            'phone' => $request->phone,
            'roles' => 'user',
        ]);

        $orangtua = OrangTua::create([
            'user_id' => $createUserForOrangTua->id,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat
        ]);

        // dd($OrangTua);

        return redirect()->route('orangtua.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        return view('pages.orangtua.edit', compact('orangtua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $orangtua = OrangTua::findOrFail($id);

        $words = explode(' ', $request->name);

        if (count($words) >= 2) {
            // Jika nama memiliki dua kata atau lebih
            $firstTwoWords = $words[0] . '.' . $words[1]; // Menggabungkan dua kata pertama
        } else {
            // Jika nama hanya memiliki satu kata
            $firstTwoWords = $words[0]; // Mengambil satu kata saja
        }

        $email = strtolower($firstTwoWords) . '@gmail.com';

        $orangtua->update($data);
        $orangtua->user->update($data);
        $orangtua->user->update([
            'email' => $email,
        ]);
        return redirect()->route('orangtua.index')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        $orangtua->user->delete();
        $orangtua->delete();
        return redirect()->route('orangtua.index');
    }
}
