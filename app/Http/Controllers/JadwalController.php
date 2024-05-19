<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use App\Models\Posyandu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count = 1;

        $jadwals = Jadwal::with('posyandu')
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('posyandu', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })
            ->paginate(10);

        return view('pages.jadwalpemeriksaan.index', compact('jadwals', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posyandus = Posyandu::all();
        return view('pages.jadwalpemeriksaan.create', compact('posyandus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'posyandu_id' => 'required|exists:posyandus,id',
            'tanggal' => 'required|date',
        ]);

        $posyandu_id = $request->input('posyandu_id');
        $tanggal = $request->input('tanggal');
        // Set locale to Indonesian
        // \Carbon\Carbon::setLocale('id');
        // $tanggal = Carbon::parse($request->input('tanggal')); // Pastikan ini adalah objek Carbon


        $existingJadwal = Jadwal::where('posyandu_id', $posyandu_id)
            ->whereMonth('tanggal', Carbon::parse($tanggal)->month)
            ->whereYear('tanggal', Carbon::parse($tanggal)->year)
            ->first();

        if ($existingJadwal) {
            $posyanduName = $existingJadwal->posyandu->name;
            // return redirect()->back()->withErrors(['msg' => "Jadwal pemeriksaan Posyandu $posyanduName untuk bulan $bulan sudah ada."])
            //     ->withInput();
            return redirect()->back()->with('error', "Jadwal pemeriksaan Posyandu $posyanduName untuk bulan terpilih sudah ada")->withInput();
        }

        // Buat jadwal baru
        $jadwal = Jadwal::create([
            'posyandu_id' => $posyandu_id,
            'tanggal' => $tanggal,
        ]);

        // Buat pemeriksaan untuk setiap balita di posyandu yang sama
        $balitas = Balita::where('posyandu_id', $posyandu_id)->get();
        foreach ($balitas as $balita) {
            Pemeriksaan::create([
                'usia' => Carbon::parse($tanggal)->diffInMonths($balita->tanggal_lahir),
                'berat_badan' => 0,
                'tinggi_badan' => 0,
                'status' => 'belum',
                'jadwal_id' => $jadwal->id,
                'balita_id' => $balita->id,
            ]);
        }

        return redirect()->route('jadwal.index')->with('message', 'Jadwal dan pemeriksaan berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
