<?php

namespace App\Http\Controllers;

use App\Http\Requests\IzinRequest;
use App\Models\{Izin, Acc_mandiv, Acc_hrd};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Exports\IzinExport;
use Maatwebsite\Excel\Facades\Excel;

class IzinController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $izins = Izin::where('user_id', $id)->get();

        return view('izin.index', compact('izins'));
    }
    public function admin()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 1) {
            $izins = Izin::where('acc_mandiv_id', 3)->latest()->get();
        } else {
            $izins = Izin::whereHas('user', function ($query) {
                $divisi_id = Auth::user()->divisi_id;
                $query->whereDivisiId($divisi_id);
            })->get();
        }

        return view('izin.admin', compact('izins'));
    }

    public function create()
    {
        return view('izin.create');
    }
    public function store(IzinRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::random(9);

        //create izin
        auth()->user()->izins()->create($attr);
        session()->flash('success', 'Permintaan anda sudah diajukan');
        session()->flash('error', 'Permintaan anda gagal diajukan');

        return redirect(route('izin.index'));
    }
    public function show(Izin $izin)
    {
        return view('izin.show', compact('izin'));
    }
    public function edit(Izin $izin)
    {
        return view('izin.edit', [
            'izin' => $izin,
            'acc_mandivs' => Acc_mandiv::get(),
            'acc_hrds' => Acc_hrd::get(),
        ]);
    }
    public function update(IzinRequest $request, Izin $izin)
    {

        $attr = $request->all();
        $attr['acc_mandiv_id'] = request('acc_mandiv');
        $attr['acc_hrd_id'] = request('acc_hrd');

        if (request('acc_mandiv') == 1) {
            $attr['acc_hrd_id'] = 4;
        } elseif (request('acc_mandiv') == 2) {
            $attr['acc_hrd_id'] = 2;
        } elseif (request('acc_mandiv') == 3 && !request('acc_hrd')) {
            $attr['acc_hrd_id'] = 1;
        }
        $izin->update($attr);

        session()->flash('success', 'Tanggapan anda sudah disimpan!');
        session()->flash('error', 'Tanggapan anda gagal disimpan!');
        return redirect(route('izin.admin'));
    }
    public function destroy(Izin $izin)
    {
        $izin->delete();
        session()->flash('success', 'Data pengajuan terhapus!');
        session()->flash('error', 'Data pengajuan gagal terhapus!');
        return redirect(route('izin.admin'));
    }
    public function destroyAll()
    {
        Izin::truncate();
        session()->flash('success', 'Tanggapan anda sudah disimpan!');
        session()->flash('error', 'Tanggapan anda gagal disimpan!');
        return redirect(route('cuti.admin'));
    }
    public function export()
    {
        return Excel::download(new IzinExport(), 'rekap-cuti.xlsx');
        return redirect("route('rekap.cuti')");
    }
}
