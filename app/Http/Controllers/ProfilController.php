<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $cuti1 = Cuti::where([
            ['user_id', '=', $user->id],
            ['kategori_id', '=', 1],
            ['acc_hrd_id', '=', 3]
        ])->count();
        $cuti2 = Cuti::where([
            ['user_id', '=', $user->id],
            ['kategori_id', '=', 2],
            ['acc_hrd_id', '=', 3]
        ])->count();
        $izin = Izin::where([
            ['user_id', '=', $user->id],
            ['acc_hrd_id', '=', 3]
        ])->count();


        return view('user.profil', compact('user', 'cuti1', 'cuti2', 'izin'));
    }
}
