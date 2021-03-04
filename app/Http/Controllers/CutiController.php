<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function pengajuan()
    {
        $cutis = Cuti::latest()->get();

        return view('pengajuan.cuti.pengajuan', compact('cutis'));
    }
    public function detail(Cuti $cuti)
    {
        return view('pengajuan.cuti.detail', compact('cuti'));
    }

    public function formulir()
    {
        // $req = request()->path();
        // dd($req);
        return view('pengajuan.cuti.formulir');
    }
}
