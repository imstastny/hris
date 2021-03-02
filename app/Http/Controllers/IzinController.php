<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function pengajuan()
    {
        return view('pengajuan.izin.pengajuan');
    }
}
