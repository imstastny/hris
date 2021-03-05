<?php

namespace App\Http\Controllers;

use App\Http\Requests\CutiRequest;
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
    public function admin()
    {
        $cutis = Cuti::latest()->get();

        return view('cuti.admin', compact('cutis'));
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
    public function store(CutiRequest $request)
    {

        $attr = $request->all();
        $attr['slug'] = Str::random(9);
        Cuti::create($attr);

        session()->flash('success', 'Permintaan anda sudah diajukan');
        session()->flash('error', 'Permintaan anda gagal diajukan');

        return redirect(route('cuti.index'));
    }
    public function edit(Cuti $cuti)
    {
        return view('cuti.edit', compact('cuti'));
    }
    public function update(CutiRequest $request, Cuti $cuti)
    {
        $attr = $request->all();
        $cuti->update($attr);

        session()->flash('success', 'Tanggapan anda sudah disimpan!');
        session()->flash('error', 'Tanggapan anda gagal disimpan!');
        return redirect(route('cuti.admin'));
    }
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        session()->flash('success', 'Data pengajuan terhapus!');
        session()->flash('error', 'Data pengajuan gagal terhapus!');
        return redirect(route('cuti.admin'));
    }
}
