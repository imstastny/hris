<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $cuti = auth()->user()->cutis(['acc_hrd_id', 3])->count();

        return view('user.profil', compact('user', 'cuti'));
    }
}
