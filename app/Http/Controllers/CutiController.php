<?php

namespace App\Http\Controllers;

use App\Http\Requests\CutiRequest;
use App\Models\{Cuti, Kategori, Acc_mandiv, Acc_hrd};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cutis = Cuti::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('cuti.index', compact('cutis'));
    }
    public function admin()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 1) {
            $cutis = Cuti::where('acc_mandiv_id', 3)->latest()->get();
        } else {
            $cutis = Cuti::whereHas('user', function ($query) {
                $divisi_id = Auth::user()->divisi_id;
                $query->whereDivisiId($divisi_id);
            })->get();
        }
        return view('cuti.admin', compact('cutis'));
    }
    public function show(Cuti $cuti)
    {
        return view('cuti.show', compact('cuti'));
    }

    public function create()
    {
        return view('cuti.create', [
            'kategoris' => Kategori::get(),

        ]);
    }
    public function store(CutiRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::random(9);
        $attr['kategori_id'] = request('kategori');
        // dd($attr);
        auth()->user()->cutis()->create($attr);
        session()->flash('success', 'Permintaan anda sudah diajukan');
        session()->flash('error', 'Permintaan anda gagal diajukan');

        return redirect(route('cuti.index'));
    }
    public function edit(Cuti $cuti)
    {
        return view('cuti.edit', [
            'cuti' => $cuti,
            'kategoris' => Kategori::get(),
            'acc_mandivs' => Acc_mandiv::get(),
            'acc_hrds' => Acc_hrd::get(),
        ]);
    }
    public function update(CutiRequest $request, Cuti $cuti)
    {
        $attr = $request->all();
        $attr['kategori_id'] = request('kategori');
        $attr['acc_mandiv_id'] = request('acc_mandiv');
        $attr['acc_hrd_id'] = request('acc_hrd');

        if (request('acc_mandiv') == 1) {
            $attr['acc_hrd_id'] = 4;
        } elseif (request('acc_mandiv') == 2) {
            $attr['acc_hrd_id'] = 2;
        } elseif (request('acc_mandiv') == 3 && !request('acc_hrd')) {
            $attr['acc_hrd_id'] = 1;
        }
        $cuti->update($attr);

        session()->flash('success', 'Tanggapan anda sudah disimpan!');
        session()->flash('error', 'Tanggapan anda gagal disimpan!');
        return redirect(route('cuti.admin'));
    }
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        session()->flash('error', 'Data pengajuan terhapus!');
        session()->flash('error', 'Data pengajuan gagal terhapus!');
        return redirect(route('cuti.admin'));
    }
    public function destroyAll()
    {
        Cuti::truncate();
        session()->flash('success', 'Tanggapan anda sudah disimpan!');
        session()->flash('error', 'Tanggapan anda gagal disimpan!');
        return redirect(route('cuti.admin'));
    }
}
