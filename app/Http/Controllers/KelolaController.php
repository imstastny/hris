<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Cuti;
use App\Models\Divisi;
use App\Models\Izin;
use App\Models\User;
use App\Models\Role;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class KelolaController extends Controller
{
    public function index()
    {
        $cuti1 = User::withCount([
            'cutis' => function ($query) {
                $query->where('acc_hrd_id', 3);
            },
            'izins' => function ($query) {
                $query->where('acc_hrd_id', 3);
            }
        ])->orderBy('divisi_id', 'asc')->with('role', 'divisi')->get();

        $users = ($cuti1->toArray());

        // $users = User::all();
        // foreach ($users as $user) {
        //     $cuti = Cuti::where([
        //         ['user_id', '=', $user->id],
        //         ['acc_hrd_id', '=', 3]
        //     ]);
        //     $izin = Izin::where([
        //         ['user_id', '=', $user->id],
        //         ['acc_hrd_id', '=', 3]
        //     ]);
        //     $users = User::with('cutis', 'izins')->orderBy('divisi_id', 'ASC')->get();

        //     $user->cutis = $cuti;
        //     $user->izins = $izin;
        return view('user.index', compact('users'));
    }



    public function create()
    {
        return view('user.create', [
            'roles' => Role::get(),
            'divisis' => Divisi::get(),
        ]);
    }
    public function store(UserRequest $request)
    {
        $request->validate([
            'nik' => 'required|unique:users|alpha_num|min:3|max:20',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users',
        ]);
        $attr = $request->all();
        $attr['role_id'] = request('role');
        $attr['divisi_id'] = request('divisi');
        $attr['password'] = Hash::make($request['password']);
        User::create($attr);
        return redirect(route('kelola.index'));
    }
    public function edit(User $user)
    {
        $year = now()->year;
        $cuti1 = Cuti::where([
            ['user_id', '=', $user->id],
            ['kategori_id', '=', 1],
            ['acc_hrd_id', '=', 3]
        ])->whereYear('tgl_mulai', '=', $year)->get();
        $totalCuti1 = 0;
        foreach ($cuti1 as $cuti) {
            $datetime1 = new DateTime($cuti->tgl_mulai);
            $datetime2 = new DateTime($cuti->tgl_selesai);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a') + 1;
            $totalCuti1 += $days;
        }
        $cuti2 = Cuti::where([
            ['user_id', '=', $user->id],
            ['kategori_id', '=', 2],
            ['acc_hrd_id', '=', 3]
        ])->whereYear('tgl_mulai', '=', $year)->get();
        $totalCuti2 = 0;
        foreach ($cuti2 as $cuti) {
            $datetime1 = new DateTime($cuti->tgl_mulai);
            $datetime2 = new DateTime($cuti->tgl_selesai);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a') + 1;
            $totalCuti2 += $days;
        }
        $izin = Izin::where([
            ['user_id', '=', $user->id],
            ['acc_hrd_id', '=', 3]
        ])->whereYear('tgl_izin', '=', $year)->count();

        return view('user.edit', [
            'user' => $user,
            'cuti1' => $totalCuti1,
            'cuti2' => $totalCuti2,
            'izin' => $izin,
            'roles' => Role::get(),
            'divisis' => Divisi::get()
        ]);
    }
    public function update(UserRequest $request, User $user)
    {
        $attr = $request->all();
        $attr['role_id'] = request('role');
        $attr['divisi_id'] = request('divisi');
        $user->update($attr);
        return redirect(route('kelola.index'));
    }
    public function destroy(User $user)
    {
        $user->delete();
    }
}
