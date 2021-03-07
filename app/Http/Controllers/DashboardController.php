<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Izin;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user = User::count();
        $cuti = Cuti::count();
        $izin = Izin::count();
        return view('dashboard', compact('user', 'cuti', 'izin'));
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
