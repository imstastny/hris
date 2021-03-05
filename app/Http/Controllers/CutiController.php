<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::latest()->get();

        return view('cuti.index', compact('cutis'));
    }
    public function show(Cuti $cuti)
    {
        return view('cuti.show', compact('cuti'));
    }

    public function create()
    {
        // $req = request()->path();
        // dd($req);
        return view('cuti.create');
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

        return redirect(route('cuti.index'));
    }
    public function edit(Cuti $cuti)
    {
        return view('cuti.edit');
    }
    public function update(Cuti $cuti)
    {
        dd('updated');
    }
}
