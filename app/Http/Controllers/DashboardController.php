<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Izin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user = User::count();
        $isCuti = Cuti::join('users', 'users.id', '=', 'cutis.user_id')
            ->join('divisis', 'users.divisi_id', '=', 'divisis.id')
            ->select('users.name', 'nik', 'divisis.nama')
            ->where('acc_hrd_id', 3)
            ->whereDate('tgl_mulai', '<=', Carbon::today())
            ->whereDate('tgl_selesai', '>=', Carbon::today())
            ->get();
        $isIzin = Izin::join('users', 'users.id', '=', 'izins.user_id')
            ->join('divisis', 'users.divisi_id', '=', 'divisis.id')
            ->select('users.name', 'nik', 'divisis.nama', 'izins.wkt_mulai', 'izins.wkt_selesai')
            ->where('acc_hrd_id', 3)
            ->whereDate('tgl_izin', '<=', Carbon::today())
            ->get();
        $cuti = Cuti::count();
        $izin = Izin::count();
        // dd($isCuti);
        // dd($isIzin);
        return view('dashboard', compact('user', 'cuti', 'izin', 'isCuti', 'isIzin'));
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
