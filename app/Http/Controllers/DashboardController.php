<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Izin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }
    public function cuti()
    {
        $cutis = Cuti::latest()->get();
        return view('cuti.rekap', compact('cutis'));
    }
    public function izin()
    {
        $izins = Izin::latest()->get();
        return view('izin.rekap', compact('izins'));
    }
}
