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
        $cuti = Cuti::where([
            ['user_id', '=', $user->id],
            ['acc_hrd_id', '=', 3]
        ])->get();
        $izin = Izin::where([
            ['user_id', '=', $user->id],
            ['acc_hrd_id', '=', 3]
        ])->get();

        $user->cutis = $cuti;
        $user->izins = $izin;

        return view('user.profil', compact('user', 'cuti', 'izin'));
    }
}
