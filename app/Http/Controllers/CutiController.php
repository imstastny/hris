<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Str;

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
    public function store(Request $request)
    {
        $attr = $request->validate([
            'tgl_mulai' => 'required',
            'jml_hari' => 'required',
            'deskripsi' => 'required',
        ]);
        $attr['slug'] = Str::random(9);

        Cuti::create($attr);

        session()->flash('success', 'Permintaan anda sudah diajukan');
        session()->flash('error', 'Permintaan anda gagal diajukan');

        return redirect(route('cuti.pengajuan'));
    }
}
