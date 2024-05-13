<?php

namespace App\Http\Controllers;

use App\Models\Variabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count = 1;

        $variabels = DB::table('variabels')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(10);

        return view('pages.fuzzy.variabel.index', compact('variabels', 'count'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $variabel = Variabel::findOrFail($id);

        dd($variabel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variabel $variabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variabel $variabel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variabel $variabel)
    {
        //
    }
}
