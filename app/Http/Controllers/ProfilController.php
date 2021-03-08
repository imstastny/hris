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


        return view('user.profil', compact('user'));
    }
}
