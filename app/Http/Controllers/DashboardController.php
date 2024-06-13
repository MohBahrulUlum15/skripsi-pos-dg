<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Bidan;
use App\Models\Jadwal;
use App\Models\OrangTua;
use App\Models\Posyandu;

class DashboardController extends Controller
{
    public function index()
    {
        $countBidan = Bidan::count();
        $countOrangTua = OrangTua::count();
        $countPosyandu = Posyandu::count();
        $countBalita = Balita::count();

        return view('dashboard', compact('countBidan', 'countOrangTua', 'countPosyandu', 'countBalita'));
    }
}
