<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function pengajuan()
    {
        return view('pengajuan.cuti.pengajuan');
    }
    public function formulir()
    {
        // $req = request()->path();
        // dd($req);
        return view('pengajuan.cuti.formulir');
    }
}
