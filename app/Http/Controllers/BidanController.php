<?php

namespace App\Http\Controllers;

use App\Models\Bidan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BidanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count = 1;

        $bidans = Bidan::with('user')
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })
            ->paginate(10);

        return view('pages.bidan.index', compact('bidans', 'count'));
        // return view('pages.bidan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.bidan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'nip' => 'required|numeric',
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

        $createUserForBidan = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => Hash::make('password'),
            'phone' => $request->phone,
            'roles' => 'nakes',
        ]);

        $bidan = Bidan::create([
            'user_id' => $createUserForBidan->id,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat
        ]);

        // dd($bidan);

        return redirect()->route('bidan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidan $bidan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bidan = Bidan::findOrFail($id);
        return view('pages.bidan.edit', compact('bidan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'nip' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $bidan = Bidan::findOrFail($id);

        $words = explode(' ', $request->name);

        if (count($words) >= 2) {
            // Jika nama memiliki dua kata atau lebih
            $firstTwoWords = $words[0] . '.' . $words[1]; // Menggabungkan dua kata pertama
        } else {
            // Jika nama hanya memiliki satu kata
            $firstTwoWords = $words[0]; // Mengambil satu kata saja
        }

        $email = strtolower($firstTwoWords) . '@gmail.com';

        $bidan->update($data);
        $bidan->user->update($data);
        $bidan->user->update([
            'email' => $email,
        ]);
        return redirect()->route('bidan.index')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidan = Bidan::findOrFail($id);
        $bidan->user->delete();
        $bidan->delete();
        return redirect()->route('bidan.index');
    }
}
